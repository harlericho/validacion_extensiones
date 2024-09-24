<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Redondeo</title>
</head>

<body>
  <?php
  $iva = 7.1745;
  // Redondeo 7.1745 a 7.18
  // echo round($iva, 2, PHP_ROUND_HALF_UP);
  // echo ceil($iva * 100) / 100;
  echo ceil(($iva + 0.001) * 100) / 100;
  ?>
</body>

</html>