

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
 

    // $sql = $pdo->prepare("SELECT * FROM voornamen ORDER BY naam_id ASC");
    $sql = $pdo->prepare("SELECT * FROM voornamen WHERE geslacht = 'm' ORDER BY totaal_voorkomen DESC LIMIT 100");
    $sql->execute();
    while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
        echo $result['voornaam']."<br/>" . "Totaal voorkomen: " . $result['totaal_voorkomen'] . "<br>";
    }





  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
  };
 ?>
  


</body>
</html>