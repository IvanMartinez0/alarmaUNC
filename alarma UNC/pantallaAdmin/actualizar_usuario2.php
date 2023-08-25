<?php

include("online.php");
$id_us = $_POST['id_us'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$dni = $_POST['dni'];
$telefono = $_POST['tel'];
$correo = $_POST['correo'];
$autoridad = $_POST['autoridad'];
$sistema = $_POST['sistema'];
$clave = $_POST['clave'];

$sql = "UPDATE usuario SET nombre_us='$nombre', id_doc='$tipo', dni_us='$dni', tel_us='$telefono', correo_us='$correo', clave_us='$clave' WHERE id_us='$id_us'";
$query = mysqli_query($online, $sql);

if ($query) {
    Header("Location: insertar_usuario.php");
} else {
    // Manejo del error si es necesario
}

?>
