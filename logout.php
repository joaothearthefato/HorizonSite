<?php
session_start();
require __DIR__ . "/php/conexao.php";

if (isset($_COOKIE['remember_token'])) {
    $token = $_COOKIE['remember_token'];

    $sql = "DELETE FROM tokens_remember WHERE token = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();

    setcookie('remember_token', '', time() - 3600, '/');
}

$_SESSION = [];
session_destroy();

header("Location: login.php");
exit;
?>