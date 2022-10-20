<?php

include("auth_session.php");
include('php_code.php');
$var = $_SESSION["username"];
$consulta2 = "SELECT `admin` 
    FROM users
    WHERE username = '$var'";

    $consulta = mysqli_query($db,$consulta2);
    $fila = $consulta -> fetch_assoc();

        echo $fila ['admin'];

   if($fila ['admin'] == 1){
    header("Location: admin.php");
   } else {
   }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index cliente</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <nav>
        <div class="alin">
            <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
            &nbsp;&nbsp;&nbsp;
            <button onclick="logoutAlert()" style="width:80px;
        height:19px; margin-top: 1.2rem;">Logout</button> 
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

<script type="text/javascript">
function logoutAlert(){

       swal({
          title: "Deseas salir de la sesion?",
          text: "",
          icon: "warning",
          buttons: true,
          dangerMode: true

      }).then(

           function(isConfirm){

           if (isConfirm) {

                window.location = "logout.php";

           }
        });
   }
</script>