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
            </tr>
        </thead>

        <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['admin']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['contraseña']; ?></td>
            <td><?php echo $row['user']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$nombre = $n['nombre'];
			$descripcion = $n['descripcion'];
            $cantidad = $n['cantidad'];
			$precio = $n['precio'];
		}
	}
?>

    <form method="post" action="php_code.php">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="input-group">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>">
        </div>
        <div class="input-group">
            <label>Descripcion</label>
            <input type="text" name="descripcion" value="<?php echo $descripcion; ?>">
        </div>
        <div class="input-group">
            <label>Cantidad</label>
            <input type="number" name="cantidad" value="<?php echo $cantidad; ?>">
        </div>
        <div class="input-group">
            <label>Precio</label>
            <input type="number" name="precio" value="<?php echo $precio; ?>">
        </div>
        <div class="input-group">
            <?php if ($update == true): ?>
            <button class="btn" type="submit" name="update" style="background: #556B2F;">Editar</button>
            <?php else: ?>
            <button class="btn" type="submit" name="save">Guardar</button>
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