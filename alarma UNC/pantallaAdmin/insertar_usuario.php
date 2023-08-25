<?php
include("online.php");

$sql = "SELECT usuario.id_us ,usuario.nombre_us, usuario.dni_us, usuario.tel_us, usuario.correo_us, autoridad.nombre_autoridad, documento.tipo_doc, usuario.sistema, usuario.clave_us
 FROM usuario
 JOIN autoridad ON usuario.autoridad_us = autoridad.id_autoridad
 JOIN documento ON usuario.id_doc = documento.id_doc";
$query = mysqli_query($online, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet">
    <title>Pantalla administrador</title>
</head>

<body>
    <div class="users-form">
        <h1>Crear usuario</h1>
        <form action="insertar_usuario2.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre Completo" required>

            <label>Tipo de documento</label>
            <select name="tipo">
               <?php
                $querytipo = "SELECT * FROM documento";
                $resultadotipo = mysqli_query($online, $querytipo);
                $fila = mysqli_num_rows($resultadotipo);
                if ($fila > 0)
                 {
                        while ($registrotipo = mysqli_fetch_array($resultadotipo)) {
                        echo '<option value="'.$registrotipo[0].'">'.$registrotipo[1].'</option>';

                    }}

                ?>
            </select>

            <input type="text" name="dni" placeholder="Documento" required>
            <input type="password" name="clave" placeholder="Contraseña" required>
            <input type="text" name="tel" placeholder="Numero de telefono" required>
            <input type="email" name="correo" placeholder="Correo" required>

             <label>Perfil de usuario</label>
            <select name="auto">
               <?php
                $queryauto = "SELECT * FROM autoridad";
                $resultadoauto = mysqli_query($online, $queryauto);
                $fila = mysqli_num_rows($resultadoauto);
                if ($fila > 0)
                 {
                        while ($registroauto = mysqli_fetch_array($resultadoauto)) {
                        echo '<option value="'.$registroauto[0].'">'.$registroauto[1].'</option>';

                    }}

                ?>
            </select>

          <label>
              <input type="radio" name="sistema" value="android" required> Android
            </label>

            <label>
              <input type="radio" name="sistema" value="ios" required> Ios
            </label>


            <input type="submit" value="Agregar">
            <a href="lista_usuario.php"> ver todos los usuarios </a>
        </form>
    </div>

</body>

</html>