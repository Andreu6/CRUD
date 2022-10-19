<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registro</title>

    <style type="text/css">
        a:link,
        a:visited,
        a:active {
            text-decoration: none;
        }
    </style>

    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <div class="alin">
        <a href="index.php">
            <b>
                <p>Index</p>
            </b>
        </a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="login.php">
            <b>
                <p>Login</p>
            </b>
        </a>
        &nbsp;&nbsp;&nbsp;
        <a href="registration.php">
            <b>
                <p>Register</p>
            </b>
        </a>
    </div>

    <?php
    require('db.php');
    if (isset($_REQUEST['username'])) {

        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $apellido = stripslashes($_REQUEST['apellido']);
        $apellido = mysqli_real_escape_string($con, $apellido);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $user = stripslashes($_REQUEST['user']);
        $user = mysqli_real_escape_string($con, $user);
        $query    = "INSERT into `users` (username, apellido, password, email, user)
                     VALUES ('$username','$apellido', '" . md5($password) . "', '$email', '$user')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Se ha registrado con éxito.</h3><br/>
                  <p class='link'>Clica aquí para <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Clica aquí para <a href='registration.php'>registrarte</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registrar</h1>
        <input type="text" class="login-input" name="username" placeholder="Nombre" required />
        <input type="text" class="login-input" name="apellido" placeholder="Apellido" />
        <input type="text" class="login-input" name="user" placeholder="Nick" />
        <input type="text" class="login-input" name="email" placeholder="Correo">
        <input type="password" class="login-input" name="password" placeholder="Contraseña">
        <input type="submit" name="submit" value="Registrar" class="login-button">
        <p class="link">¿Ya tiene una cuenta? <a href="login.php">Inicie sesión</a></p>
    </form>
    <?php
    }
?>
</body>

</html>