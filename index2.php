<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Subir Imagen</title>
</head>

<body>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    Selecciona la imagen a subir:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Subir Imagen" name="submit">
  </form>
</body>

</html>