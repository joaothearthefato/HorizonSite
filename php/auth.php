<?php
session_start();
require "conexao.php";

$acao = $_POST['acao'] ?? '';

// --- REGISTRO ---
if ($acao == "registrar") {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? ''; // sem trim() em senha

    if (empty($nome) || empty($email) || empty($senha)) {
        die("Por favor, preencha todos os campos.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("E-mail inválido.");
    }

    $sqlCheck = "SELECT id FROM usuarios WHERE email = ?";
    $stmtCheck = $conexao->prepare($sqlCheck);
    $stmtCheck->bind_param("s", $email);
    $stmtCheck->execute();
    if ($stmtCheck->get_result()->num_rows > 0) {
        die("Este e-mail já está cadastrado.");
    }

    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senhaCriptografada);

    if ($stmt->execute()) {
        header("Location: ../login.php?registro=sucesso");
        exit;
    } else {
        die("Erro ao registrar: " . $conexao->error);
    }
}

// --- LOGIN ---
if ($acao == "login") {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? ''; // sem trim() em senha

    if (empty($email) || empty($senha)) {
        die("Preencha e-mail e senha.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("E-mail inválido.");
    }

    $sql = "SELECT id, nome, senha FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($usuario = $resultado->fetch_assoc()) {
        if (password_verify($senha, $usuario['senha'])) {

            session_regenerate_id(true);
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];

            // --- LEMBRAR-ME ---
            if (isset($_POST['remember']) && $_POST['remember'] == '1') {
                $token = bin2hex(random_bytes(32));
                $expira = date('Y-m-d H:i:s', strtotime('+30 days'));

                $sqlToken = "INSERT INTO tokens_remember (usuario_id, token, expira_em) VALUES (?, ?, ?)";
                $stmtToken = $conexao->prepare($sqlToken);
                $stmtToken->bind_param("iss", $usuario['id'], $token, $expira);
                $stmtToken->execute();

                setcookie('remember_token', $token, time() + (30 * 24 * 60 * 60), '/', '', false, true);
            }

            header("Location: ../dashboard.php");
            exit;
        } else {
            // Mensagem genérica para não revelar se o email existe
            header("Location: ../login.php?erro=credenciais");
            exit;
        }
    } else {
        header("Location: ../login.php?erro=credenciais");
        exit;
    }
}
?>