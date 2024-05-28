<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_datosmasivos";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Verifica si el archivo fue subido sin errores
  if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
    $file = $_FILES["file"]["tmp_name"];

    // Abre el archivo CSV
    if (($handle = fopen($file, "r")) !== FALSE) {
      // Conecta a la base de datos
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
      }

      // Comienza una transacción
      $conn->begin_transaction();

      try {
        // Lee la primera línea para obtener los nombres de las columnas
        $headers = fgetcsv($handle, 1000, ",", "\"");

        // Procesa cada línea del CSV
        while (($data = fgetcsv($handle, 1000, ",", "\"")) !== FALSE) {
          // Prepara los datos para la inserción
          $values = array_map(function ($value) use ($conn) {
            return "'" . $conn->real_escape_string($value) . "'";
          }, $data);

          $sql = "INSERT INTO info (" . implode(",", $headers) . ") VALUES (" . implode(",", $values) . ")";

          if (!$conn->query($sql)) {
            throw new Exception("Error al insertar datos: " . $conn->error);
          }
        }

        // Confirma la transacción
        $conn->commit();

        echo "Archivo CSV subido y datos insertados exitosamente.";
      } catch (Exception $e) {
        // En caso de error, revierte la transacción
        $conn->rollback();
        echo $e->getMessage();
      }

      // Cierra la conexión a la base de datos
      $conn->close();
    } else {
      echo "Error al abrir el archivo.";
    }
  } else {
    echo "Error al subir el archivo.";
  }
} else {
  echo "Método de solicitud no válido.";
}
