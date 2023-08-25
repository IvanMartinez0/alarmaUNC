    <?php
include("online.php");

$sql = "SELECT usuario.id_us ,usuario.nombre_us, historial.id_his, historial.razon_his, historial.iniciohora_his, historial.apagahora_his, historial.descripcion_his, edificio.nombre_edif, historial.usuarioinicia_edif, historial.usuarioapaga_his, historial.edificio_his, historial.contacto_his, contacto.num_contacto, edificio.id_edif, contacto.id_contacto
 FROM historial
 JOIN usuario ON historial.usuarioapaga_his = usuario.id_usuario 
 JOIN usuario ON  historial.usuarioinicia_his = usuario.id_usuario
 JOIN edificio ON historial.edificio_his = edificio.id_edif
 JOIN contacto ON historial.contacto_his = contacto.id_contacto";
$query = mysqli_query($online, $sql);

?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="css/style.css" rel="stylesheet">
        <title>Historial</title>
    </head>
    <body>
    
 <div class="users-table">
        <h2>Alarmas registradas</h2>
        <table>
            <thead>
                <tr>
                    
                    <th></th>
                    <th>Tipo de documeto</th>
                    <th>Documento</th>
                    <th>Numero de telefono</th>
                    <th>Correo</th>
                    <th>Dispositivo</th>
                    <th>Perfil de usuario</th>
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
                        <<?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
    </html>
