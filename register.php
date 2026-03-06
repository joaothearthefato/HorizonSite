<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Registro — Horizon</title>
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
            <form action="php/auth.php" method="POST">
                <input type="hidden" name="acao" value="registrar">

                <h1>Olá, registre-se</h1>

                <div class="social">
                    <div class="circle"><a href="#">G</a></div>
                    <div class="circle"><a href="#">in</a></div>
                </div>

                <!-- Ordem correta: nome → email → senha -->
                <div class="input-group">
                    <input type="text" name="nome" placeholder="Usuário" required>
                    <i class='bx bxs-user'></i>
                </div>

                <div class="input-group">
                    <input type="email" name="email" placeholder="E-mail" required>
                    <i class='bx bxs-envelope'></i>
                </div>

                <div class="input-group">
                    <input type="password" name="senha" placeholder="Senha" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <button type="submit" class="btn">REGISTRAR</button>

                <p class="login">Já tem uma conta? <a href="login.php">Entrar</a></p>
            </form>
        </div>

    </div>
</body>

</html>