<?php

$host = 'localhost:8080';
$usuario = 'root';
$contrasena = ''; 
$base_de_datos = 'jbgopera_jbgimfca';

//La variable "conn" permitirá crear una conexión con nnuestra BD.
$conn = mysqli_connect($host,$usuario,$contrasena,$base_de_datos);

// Verificar si la conexión fue exitosa
if (!$conn) {
    echo "Error en la conexion a la base de datos: ";
    exit();
}

// Establecer la codificación de caracteres
mysqli_set_charset($conn, "utf8");



?>