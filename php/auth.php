<?php
session_start(); // inicia sessão (para manter usuário logado)

require "config.php"; // puxa conexão com banco

// Verifica qual ação foi enviada pelo formulário
$acao = $_POST['acao'] ?? '';

/* =====================================================
   REGISTRO
===================================================== */
if ($acao == "registrar") {

    // Pegando dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Criptografando senha (NUNCA salve senha normal)
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    // Preparando comando SQL
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);

    // Substituindo os ? pelos valores
    $stmt->bind_param("sss", $nome, $email, $senhaCriptografada);

    // Executando
    if ($stmt->execute()) {
        echo "Conta criada com sucesso! <a href='login.php'>Fazer login</a>";
    } else {
        echo "Erro ao criar conta.";
    }
}

/* =====================================================
   LOGIN
===================================================== */
if ($acao == "login") {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Procurar usuário pelo email
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $resultado = $stmt->get_result();

    // Se encontrou usuário
    if ($resultado->num_rows > 0) {

        $usuario = $resultado->fetch_assoc();

        // Verifica se a senha digitada bate com a criptografada
        if (password_verify($senha, $usuario['senha'])) {

            // Cria sessão
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];

            header("Location: dashboard.php");
            exit;

        } else {
            echo "Senha incorreta.";
        }

    } else {
        echo "Usuário não encontrado.";
    }
}
?>