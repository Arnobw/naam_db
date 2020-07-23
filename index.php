

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php
include_once('database_config.php');



try {
    $pdo = new PDO("mysql:host=" . servername . ";dbname=" . dbname, user, password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "success =) <br>";

    // $sql = $pdo->prepare("SELECT * FROM voornamen ORDER BY naam_id ASC");
    $sql = $pdo->prepare("SELECT TOP 100 totaal_voorkomen,voornaam, geslacht");
    $sql->execute();
    while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
        echo $result['voornaam']."<br/>";
        echo strlen($result['voornaam']."<br/>") ;
    }





  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
  };
 ?>
  


</body>
</html>