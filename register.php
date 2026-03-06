<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/register.css">
 <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

<div class="container" id="container">

    <div class="left">
        <!-- imagem já vem pelo CSS -->
    </div>

    <div class="right">
        <h1>Olá, registre-se</h1>

        <div class="social">
            <div class="circle">G</div>
            <div class="circle">in</div> 
        </div>

        <div class="input-group">
            <input name="nome" type="text" placeholder="Usuário">
            <i class='bx bxs-user'></i>
        </div>

        <div class="input-group">
            <input name="senha" type="password" placeholder="Senha">
            <i class='bx bxs-lock-alt'></i>
        </div>

        <div class="input-group">
            <input type="email" placeholder="Email">
            <i class='bx bxs-envelope'></i>
        </div>

        <button class="btn">REGISTRAR</button>

        <p class="login">Já tem uma conta? <a href="login.php">Entrar</a></p>
    </div>

</div>
</body>
</html>