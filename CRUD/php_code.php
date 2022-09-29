<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', 'usbw', 'crud');

	// initialize variables
	$nombre = "";
	$descripcion = "";
    $cantidad = "";
    $precio = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
        $cantidad = $_POST['cantidad'];
		$precio = $_POST['precio'];

		mysqli_query($db, "INSERT INTO info (nombre, descripcion, cantidad, precio) VALUES ('$nombre', '$descripcion', $cantidad, $precio)"); 
		$_SESSION['message'] = "Producto guardado!"; 
		header('location: index.php');
	}

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $cantidad = $_POST['cantidad'];
		$precio = $_POST['precio'];
    
        mysqli_query($db, "UPDATE info SET nombre='$nombre', descripcion='$descripcion', cantidad='$cantidad', precio='$precio' WHERE id=$id");
        $_SESSION['message'] = "Producto editado!"; 
        header('location: index.php');
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM info WHERE id=$id");
        $_SESSION['message'] = "Producto borrado!"; 
        header('location: index.php');
    }
    ?>