<?php

include("online.php");

$id = $_GET["id_us"];


$sql="DELETE FROM usuario WHERE id_us='$id'";
$query = mysqli_query($online, $sql);

if($query){
Header("Location: menu.php");
}
?>