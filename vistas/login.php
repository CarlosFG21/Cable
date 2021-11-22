<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/Login_1.css" />
    <title>Cablevision | Robles</title>
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup"-->
                <form action="../crud/validarUsuario.php" class="sign-in-form" method="post">
                    <h2 class="title">Bienvenido</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Usuario" name="nickname" id="nickname" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Contraseña" name="contrasena" id="contrasena" required/>
                    </div>
                    <input type="submit" value="Acceder" class="btn solid" />
                    <p class="social-text">!Accede ahora!</p>
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3> Cablevisión Robles</h3>
                    <p>
                        IMAGEN Y CORAZON DE GUALAN, A LA ORDEN DE TODOS LOS GUALANTECOS!
                    </p>
                </div>
                <img src="../img/victor.svg" class="image" alt="" />
            </div>
        </div>
    </div>
</body>
</html>