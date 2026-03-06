<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Horizon</title>
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <main class="container">
        <form action="php/auth.php" method="POST">
            <input type="hidden" name="acao" value="login">

            <h1>Login</h1>

            <?php if (isset($_GET['erro']) && $_GET['erro'] === 'credenciais'): ?>
                    <p class="msg-erro">E-mail ou senha inválidos.</p>
            <?php endif; ?>

            <?php if (isset($_GET['registro']) && $_GET['registro'] === 'sucesso'): ?>
                    <p class="msg-sucesso">Conta criada com sucesso! Faça login.</p>
            <?php endif; ?>

            <div class="input-box">
                <input type="email" name="email" placeholder="E-mail" required>
                <i class="bx bxs-user"></i>
            </div>

            <div class="input-box">
                <input type="password" name="senha" placeholder="Senha" required>
                <i class="bx bxs-lock-alt"></i>
            </div>

            <div class="remember-forgot">
                <div class="remember-side">
                    <input type="checkbox" id="remember" name="remember" value="1">
                    <label for="remember">Lembrar-me</label>
                </div>
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
