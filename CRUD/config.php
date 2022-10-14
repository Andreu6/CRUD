<?php
define('USER', 'root');
define('PASSWORD', 'usbw');
define('HOST', 'localhost');
define('DATABASE', 'crud');
 
try {
    $connection = new PDO(HOST, DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>