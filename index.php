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
  <script>
    function validarArchivo() {
      var archivoInput = document.getElementById('archivo');
      var archivo = archivoInput.files[0];
      var extensionesPermitidas = '<?php echo $allowed_extensions; ?>'.split(',');

      if (archivo) {
        var nombreArchivo = archivo.name;
        var extension = nombreArchivo.split('.').pop();

        if (extensionesPermitidas.indexOf(extension) === -1) {
          alert('Este tipo de archivo no está permitido. Por favor, sube un archivo con una de las siguientes extensiones: ' + extensionesPermitidas.join(', '));
          archivoInput.value = ''; // Limpiar el valor del input de archivo
          return false;
        }
      }

      return true;
    }
  </script>
</head>

<body>
  <h2>Subir Archivo</h2>
  <form method="post" enctype="multipart/form-data" onsubmit="return validarArchivo()">
    <input type="file" name="archivo" id="archivo" onchange="validarArchivo()">
    <button type="submit">Subir Archivo</button>
  </form>
</body>

</html>