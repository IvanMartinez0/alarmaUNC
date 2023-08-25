<?php
include("online.php");

$id_us = $_GET['id_us'];

$sql = "SELECT usuario.id_us, usuario.nombre_us, usuario.dni_us, usuario.tel_us, usuario.correo_us, autoridad.nombre_autoridad, documento.tipo_doc, usuario.sistema, usuario.clave_us
    FROM usuario
    JOIN autoridad ON usuario.autoridad_us = autoridad.id_autoridad
    JOIN documento ON usuario.id_doc = documento.id_doc
    WHERE usuario.id_us = " . $id_us;
$query = mysqli_query($online, $sql);

$row = mysqli_fetch_array($query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Editar usuario</title>
</head>
<body>
<div class="users-form">
    <form action="editar_usuario.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" value="<?= $row['nombre_us'] ?>" required>
        <select name="tipo">
    <?php
    $sqltipo = "SELECT * FROM documento";
    $resultadotipo = mysqli_query($online, $sqltipo);

    if ($resultadotipo && mysqli_num_rows($resultadotipo) > 0) {
        while ($registrotipo = mysqli_fetch_array($resultadotipo)) {
            $selected = ($registrotipo[1] == $row['tipo_doc']) ? 'selected' : '';
            echo '<option ' . $selected . ' value="' . $registrotipo[0] . '">' . $registrotipo[1] . '</option>';
        }
    }
    ?>
</select>


        <input type="hidden" name="id_us" value="<?= $id_us ?>">
        <input type="text" name="dni" placeholder="DNI" value="<?= $row['dni_us'] ?>" required>
        <input type="text" name="clave" placeholder="Contraseña" value="<?= $row['clave_us'] ?>" required>
        <input type="text" name="tel" placeholder="Telefono" value="<?= $row['tel_us'] ?>" required>
        <input type="text" name="correo" placeholder="Correo" value="<?= $row['correo_us'] ?>" required>
        <select name="autoridad">
            <?php
            $queryauto = "SELECT * FROM autoridad";
            $resultadoauto = mysqli_query($online, $queryauto);

            if ($resultadoauto && mysqli_num_rows($resultadoauto) > 0) {
                while ($registroauto = mysqli_fetch_array($resultadoauto)) {
                    $selected = ($registroauto[1] == $row['nombre_autoridad']) ? 'selected' : '';
                    echo '<option value="' . $registroauto[1] . '" ' . $selected . '>' . $registroauto[1] . '</option>';
                }
            }
            ?>
        </select>

</select>

        </select>
        <label>
        <input type="radio" name="sistema" value="android" <?php echo ($row['sistema'] === 'android') ? 'checked' : ''; ?>> Android
        </label>
        <label>
        <input type="radio" name="sistema" value="ios" <?php echo ($row['sistema'] === 'ios') ? 'checked' : ''; ?>> IOS
        </label>

        <input type="submit" value="Actualizar">
    </form>
</div>
</body>
</html>