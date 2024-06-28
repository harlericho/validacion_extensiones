<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Subida masiva de CSV</title>
</head>

<body>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="file">Selecciona el archivo CSV:</label>
    <input type="file" name="file" id="file" accept=".csv">
    <input type="submit" value="Subir CSV">
  </form>
</body>

</html>