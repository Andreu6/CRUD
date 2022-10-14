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
            <a href="login.php"><p>Login</p></a>
            &nbsp;&nbsp;&nbsp;
            <a href="register.php"><p>Register</p></a>
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
                <th colspan="2">Accion</th>
            </tr>
        </thead>

        <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['cantidad']; ?></td>
            <td><?php echo $row['precio']; ?></td>
            <td>
                <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Editar</a>
            </td>
            <td>
                <a href="php_code.php?del=<?php echo $row['id']; ?>" class="del_btn">Borrar</a>
            </td>
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