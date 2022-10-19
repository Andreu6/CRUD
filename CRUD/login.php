<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>

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
    session_start();

    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;

            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Usuario/Contraseña Incorrecto</h3><br/>
                  <p class='link'>Clica aquí para <a href='login.php'>Login</a> de nuevo.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Nombre" autofocus="true" />
        <input type="password" class="login-input" name="password" placeholder="Contraseña" />
        <input type="submit" value="Login" name="submit" class="login-button" />
        <p class="link">¿No tiene una cuenta? <a href="registration.php">Regístrese ahora</a></p>
    </form>
    <?php
    }
?>
</body>

</html>