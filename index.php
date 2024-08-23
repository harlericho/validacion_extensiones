<!doctype html>
<html lang="en">

<head>
  <title>EXCEL</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
  <button type="button" class="btn btn-outline-primary" onclick="descargar()">
    Descargar
  </button>

  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
<script>
  function descargar() {
    // // Crear un array con los datos del archivo CSV
    // var csv = [
    //   ['Nombre', 'Apellido', 'Edad', '09999999999'],
    //   ['Juan', 'Pérez', 30, '0899999988'],
    //   ['María', 'Gómez', 25, '07899999999'],
    //   ['Carlos', 'López', 35, '06799999999'],
    //   ['Ana', 'Martínez', 40, '05699999999']
    // ];
    // // Pasara ese array en formato CSV
    // var csvContent = 'data:text/csv;charset=utf-8,';
    // csv.forEach(function(rowArray) {
    //   var row = rowArray.join(',');
    //   csvContent += row + '\r\n';
    // });
    // // Crear un enlace para descargar el archivo CSV
    // var encodedUri = encodeURI(csvContent);
    // var link = document.createElement('a');
    // link.setAttribute('href', encodedUri);
    // link.setAttribute('download', 'archivo.csv');
    // document.body.appendChild(link);
    // link.click();

    var csv = [
      ['Cedula', 'Nombre', 'Apellido', 'Edad', 'Teléfono'],
      ['="0989090989"', 'Juan', 'Pérez', 30, '= "0899999988"'],
      ['="0879867877"', 'María', 'Gómez', 25, '= "07899999999"'],
      ['="1312362062"', 'Carlos', 'López', 35, '= "06799999999"'],
      ['="1723456789"', 'Ana', 'Martínez', 40, '= "05699999999"']
    ];
    // Pasar ese array en formato CSV
    var csvContent = 'data:text/csv;charset=utf-8,';
    csv.forEach(function(rowArray) {
      var row = rowArray.join(',');
      csvContent += row + '\r\n';
    });

    // Crear un enlace para descargar el archivo CSV
    var encodedUri = encodeURI(csvContent);
    var link = document.createElement('a');
    link.setAttribute('href', encodedUri);
    link.setAttribute('download', 'archivo.csv');
    document.body.appendChild(link);
    link.click();
  }
</script>