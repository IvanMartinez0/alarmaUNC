<?php
include("online.php");



$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$dni = $_POST['dni'];
$tel = $_POST['tel'];
$correo = $_POST['correo'];
$autoridad = $_POST['auto'];
$sistema = $_POST['sistema'];
$clave = $_POST['clave'];

$sql = "INSERT INTO usuario (nombre_us, id_doc ,dni_us, tel_us, correo_us, autoridad_us, sistema, clave_us) VALUES ('$nombre', '$tipo', '$dni', '$tel', '$correo', '$autoridad', '$sistema', '$clave')";

$query = mysqli_query($online, $sql);

if($query){
    Header("Location: insertar_usuario.php");
}else{

}

?>