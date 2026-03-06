<?php
// ⚠️  ATENÇÃO: Em produção, substitua estes valores por variáveis de ambiente
// e NUNCA suba este arquivo para repositórios públicos (adicione ao .gitignore)
$servidor = "localhost";
$usuario = "root";
$senha = "Home@spSENAI2025!"; // troque pela sua senha real localmente
$banco = "horizon_db";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);
$conexao->set_charset("utf8mb4");

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>