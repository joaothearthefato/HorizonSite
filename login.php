<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <main class="container">
        <form action="php/auth.php" method="POST" class="form-login">
            <H1>Login</H1>
            <div class="input-box">
                <input name="email" placeholder="Usuario" type="email">
                <i class="bx bxs-user"> </i>
            </div>
            <div class="input-box">
                <input name="senha" placeholder="Senha" type="password">
                <i class="bx bxs-lock-alt"></i>
            </div>
            <div class="remember-forgot">
                <input type="checkbox" id="remember" class="checkbox-remember" style="list-style-type: circle;">
                <label for="remember">Lembrar-me</label>
                <a class="linkforgot" href="forgetpswd.php">Esqueceu a senha?</a>
            </div>
            <button type="submit" class="submitbutton">Entrar</button>

            <div class="register-link">
                <p>Não tem uma conta? <a href="register.php">Registrar-se</a></p>
            </div>
        </form>

    </main>
</body>

</html>