<?php
// Incluir la clase de conexión a la base de datos
require_once 'conexion.php';

// Crear una instancia de la clase de conexión a la base de datos
$database = new Database();

// Obtener las extensiones permitidas desde la base de datos
$allowed_extensions = $database->getExtensions();

// Mensaje de error predeterminado
$error = '';

// Verificar si se envió un archivo
if (isset($_FILES['archivo'])) {
  $file_name = $_FILES['archivo']['name'];
  $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

  // Verificar si la extensión del archivo está en la lista de extensiones permitidas
  if (!in_array($file_extension, explode(',', $allowed_extensions))) {
    $error = "Este tipo de archivo no está permitido. Por favor, sube un archivo con una de las siguientes extensiones: " . $allowed_extensions;
  } else {
    // Aquí puedes mover el archivo a la ubicación deseada
    move_uploaded_file($_FILES['archivo']['tmp_name'], 'ruta/donde/guardar/' . $file_name);
    echo "¡El archivo se subió correctamente!";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Subir Archivo</title>
</head>

<body>
  <h2>Subir Archivo</h2>
  <?php if ($error) : ?>
    <p style="color: red;"><?php echo $error; ?></p>
  <?php endif; ?>
  <form method="post" enctype="multipart/form-data">
    <input type="file" name="archivo">
    <button type="submit">Subir Archivo</button>
  </form>
</body>

</html>