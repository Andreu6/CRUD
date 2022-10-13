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

    $id2 = 0;
    $admin2 = "";
    $nombre2 = "";
    $apellido = "";
    $email = "";
    $contraseña = "";
    $user = "";

	if (isset($_POST['save'])) {
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
        $cantidad = $_POST['cantidad'];
		$precio = $_POST['precio'];

		mysqli_query($db, "INSERT INTO info (nombre, descripcion, cantidad, precio) VALUES ('$nombre', '$descripcion', $cantidad, $precio)"); 
		$_SESSION['message'] = "Producto guardado!"; 
		header('location: index.php');
	}

    if (isset($_POST['save2'])) {
        $admin2 = $_POST['admin2']
		$nombre2 = $_POST['nombre2'];
		$apellido = $_POST['apellido'];
        $email = $_POST['email'];
		$contraseña = $_POST['contraseña'];
        $user = $_POST['user'];

		mysqli_query($db, "INSERT INTO usuario (admin2, nombre, apellido, email, contraseña, user) VALUES ($admin, '$nombre', '$apellido', '$email', '$contraseña', '$user')"); 
		$_SESSION['message'] = "Producto guardado!"; 
		header('location: register.php');
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