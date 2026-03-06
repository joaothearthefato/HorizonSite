<?php
session_start();

// Proteção da página
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
        
</head>
<body>

<h1>Bem-vindo, <?php echo $_SESSION['usuario_nome']; ?> 🚀</h1>

<a href="logout.php">Sair</a>

</body>
</html>