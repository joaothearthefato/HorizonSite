<?php
session_start();
$conn = new mysqli("localhost","root","","saep_db");

if(isset($_POST['email'])){

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
$result = $conn->query($sql);

if($result->num_rows > 0){

$usuario = $result->fetch_assoc();
$_SESSION['usuario'] = $usuario['nome'];

header("Location: dashboard.php");

}else{

echo "Login inválido<br>";
}

}
?>

<html>

<head>
<title>Login</title>
</head>

<body>

<h2>Login do Sistema Financeiro</h2>

<form method="POST">

Email:<br>
<input type="email" name="email">

<br><br>

Senha:<br>
<input type="password" name="senha">

<br><br>

<input type="submit" value="Entrar">

</form>

</body>

</html>