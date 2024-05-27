<?php
include 'connection.php'; // Incluir el archivo de configuración de la base de datos

// Ruta relativa a la carpeta 'imagenes' en la raíz del proyecto
$target_dir = __DIR__ . "/img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verificar si el archivo es una imagen real o un falso
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
    echo "El archivo es una imagen - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "El archivo no es una imagen.";
    $uploadOk = 0;
  }
}

// Verificar si el archivo ya existe
if (file_exists($target_file)) {
  echo "Lo siento, el archivo ya existe.";
  $uploadOk = 0;
}

// Verificar el tamaño del archivo
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Lo siento, tu archivo es demasiado grande.";
  $uploadOk = 0;
}

// Permitir ciertos formatos de archivo
if (
  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif"
) {
  echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
  $uploadOk = 0;
}

// Verificar si $uploadOk es 0 por un error
if ($uploadOk == 0) {
  echo "Lo siento, tu archivo no fue subido.";
  // Si todo está bien, intenta subir el archivo
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "El archivo " . basename($_FILES["fileToUpload"]["name"]) . " ha sido subido.";

    // Guardar la ruta relativa en la base de datos
    $image_path = "img/" . basename($_FILES["fileToUpload"]["name"]);
    $sql = "INSERT INTO imagenes (ruta) VALUES ('$image_path')";

    if ($conn->query($sql) === TRUE) {
      echo "La ruta de la imagen ha sido guardada en la base de datos.";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "Lo siento, hubo un error al subir tu archivo.";
  }
}

$conn->close();
