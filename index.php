<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto);

        body {
          font-family: Roboto, sans-serif;
        }
        
        #chart {
          max-width: 650px;
          margin: 35px auto;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="./index.js"></script>
</head>
<body>
    <div id="chart"></div>
    <?php
        $host = 'localhost';
        $dbname = 'testedosguri';
        $username = 'root';
        $password = '';

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM vendas");
        $stmt->execute();
        
        $array = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $valor1 = strval($row['id']);
          $valor2 = strval($row['qtdVendas']);
          $valor3 = strval($row['anoVenda']);
          $array[] = $valor1 .','. $valor2 .',' .  $valor3;
        }
        $array = implode(';', $array);
        echo '<script>';
        echo 'enviaDados("' . $array . '");';
        echo '</script>';
    ?>
</body>
</html>
