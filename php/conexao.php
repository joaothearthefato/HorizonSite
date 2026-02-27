<?php
$servidor = "localhost";
$usuario = "root";
$senha = "Home@spSENAI2025!";
$banco = "login_simples";

// Criando conexão
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se deu erro
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>