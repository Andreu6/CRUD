<?php  include('php_code.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Index cliente</title>

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

    <nav>
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
    </nav>

    <?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>

        <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['cantidad']; ?></td>
            <td><?php echo $row['precio']; ?></td>
        </tr>
        <?php } ?>
    </table>


</body>

</html>