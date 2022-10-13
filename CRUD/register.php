<?php  include('php_code.php'); ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">

<head>
    <title>Andreu</title>
</head>

<body>

    <nav>
        <div class="alin">
            <a href="">
                <p>Login</p>
            </a>
            &nbsp;&nbsp;&nbsp;
            <a href="">
                <p>Register</p>
            </a>
        </div>
    </nav>

    <?php $results = mysqli_query($db, "SELECT * FROM usuario"); ?>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Admin</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>User</th>
                <th colspan="2">Accion</th>
            </tr>
        </thead>

        <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['admin2']; ?></td>
            <td><?php echo $row['nombre2']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['contraseña']; ?></td>
            <td><?php echo $row['user']; ?></td>
            <td>
                <a href="register.php?edit=<?php echo $row['id2']; ?>" class="edit_btn">Editar</a>
            </td>
            <td>
                <a href="php_code.php?del=<?php echo $row['id2']; ?>" class="del_btn">Borrar</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    

    <form method="post" action="php_code.php">

        <input type="hidden" name="id2" value="<?php echo $id2; ?>">

        <div class="input-group">
            <label>Admin</label>
            <input type="number" name="admin2" value="<?php echo $admin2; ?>">
        </div>
        <div class="input-group">
            <label>Nombre</label>
            <input type="text" name="nombre2" value="<?php echo $nombre2; ?>">
        </div>
        <div class="input-group">
            <label>Apellido</label>
            <input type="text" name="apellido" value="<?php echo $apellido; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>Contraseña</label>
            <input type="text" name="contraseña" value="<?php echo $contraseña; ?>">
        </div>
        <div class="input-group">
            <label>User</label>
            <input type="text" name="user" value="<?php echo $user; ?>">
        </div>
        <div class="input-group">
            <?php if ($update == true): ?>
            <button class="btn" type="submit" name="update" style="background: #556B2F;">Editar</button>
            <?php else: ?>
            <button class="btn" type="submit" name="save2">Guardar</button>
            <?php endif ?>
        </div>
    </form>
</body>

<?php if (isset($_SESSION['message'])): ?>
<div class="msg">
    <?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
</div>
<?php endif ?>

</html>