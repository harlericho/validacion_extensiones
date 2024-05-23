<?php
require_once 'conexion.php'; // Asegúrate de que el archivo Database.php esté en el mismo directorio

// Crear una instancia de la clase Database
$db = new Database("localhost", "root", "", "db_extensiones");

// Realizar la consulta
$sql = "SELECT nombre FROM info";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  // Salida de datos de cada fila
  while ($row = $result->fetch_assoc()) {
    // Obtener el nombre del archivo sin la coma, es decir tengo xml,pdf y quiero xml y pdf
    $extension = strtolower(pathinfo($row["nombre"], PATHINFO_EXTENSION));
    if (!in_array($extension, $allowedExtensions)) {
      $allowedExtensions[] = $extension;
    }
  }
} else {
  echo "0 resultados";
}

// Cerrar la conexión
$db->close();
