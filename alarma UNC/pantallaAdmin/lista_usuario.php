<?php
include("online.php");

$sql = "SELECT usuario.id_us ,usuario.nombre_us, usuario.dni_us, usuario.tel_us, usuario.correo_us, autoridad.nombre_autoridad, documento.tipo_doc, usuario.sistema, usuario.clave_us
 FROM usuario
 JOIN autoridad ON usuario.autoridad_us = autoridad.id_autoridad
 JOIN documento ON usuario.id_doc = documento.id_doc";
$query = mysqli_query($online, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lista usuarios</title>
	<link href="CSS/style.css" rel="stylesheet">
</head>
<body>

<div class="users-table">
        <h2>Usuarios registrados</h2>
        <table>
            <thead>
                <tr>
                    
                    <th>Nombre completo</th>
                    <th>Tipo de documeto</th>
                    <th>Documento</th>
                    <th>Numero de telefono</th>
                    <th>Correo</th>
                    <th>Dispositivo</th>
                    <th>Perfil de usuario</th>
                    <th>clave</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                 while ($row = mysqli_fetch_array($query))
                { ?>
                    <tr>

                        
                        <th><?= $row['nombre_us'] ?></th>
                        <th><?= $row['tipo_doc'] ?></th>
                        <th><?= $row['dni_us'] ?></th>
                        <th><?= $row['tel_us'] ?></th>
                        <th><?= $row['correo_us'] ?></th>
                        <th><?= $row['sistema'] ?></th>
                        <th><?= $row['nombre_autoridad'] ?></th>
                        <th><?= $row['clave_us'] ?></th>
                        

                        <td><a href="insertar_usuario.php?id_us= <?= $row['id_us'] ?>" class="users-table--edit">Editar</a></td>
                        <td><a href="eliminar_usuario.php?id_us=<?= $row['id_us'] ?>" class="users-table--delete">Eliminar</a></td>
                        <a href="insertar_usuario.php "> insertar un usuario nuevo </a>


                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

</body>

</html>

