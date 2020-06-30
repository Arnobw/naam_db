

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
    echo "success =)";

    $jongens_namen = $pdo->prepare("SELECT * FROM 'voornamen_jongens_1995_2017_0' WHERE 1");
    $submissions->bindParam(':startdate', $startdate_timestamp);
    $submissions->bindParam(':enddate', $enddate_timestamp);
    $submissions->execute(); 
    $submission_array = $submissions->fetchAll();





  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
  };
 ?>
  


</body>
</html>