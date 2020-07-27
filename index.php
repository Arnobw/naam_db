<!-- SELECT geslacht, SUM(totaal_voorkomen*LENGTH(voornaam))  / SUM(totaal_voorkomen) GemiddeldeM FROM `voornamen` GROUP BY geslacht -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Namen</title>
  <link rel="stylesheet" href="css/main.css">

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

  <script src="js/main.js"> </script>


</head>
<body>

<?php
include_once('database_config.php');



try {
    $pdo = new PDO("mysql:host=" . servername . ";dbname=" . dbname, user, password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 ?>


 <?php 

    // $sql = $pdo->prepare("SELECT * FROM voornamen ORDER BY naam_id ASC");
    $sql = $pdo->prepare("SELECT * FROM voornamen WHERE geslacht = 'm' ORDER BY totaal_voorkomen DESC LIMIT 100");
    $sql->execute();

    
    $sql_avg = $pdo->prepare("SELECT geslacht, SUM(totaal_voorkomen*LENGTH(voornaam))  / SUM(totaal_voorkomen) GemiddeldeM FROM `voornamen` GROUP BY geslacht");
    $sql_avg->execute();
    $result_avg = $sql_avg->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="mannen_namen">

    <?php

    echo "De gemiddelde lengte van alle jongensnamen is " . $result_avg[0]['GemiddeldeM'] . " letters.";
    while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
        echo $result['voornaam']."<br/>" . "Totaal voorkomen: " . $result['totaal_voorkomen'] . "<br>" . '<hr>' ;
      }
    

    ?>
    </div>


    <div class="vrouwen_namen">

    <?php
    $sql = $pdo->prepare("SELECT * FROM voornamen WHERE geslacht = 'v' ORDER BY totaal_voorkomen DESC LIMIT 100");
    $sql->execute();
    $sql_avg = $pdo->prepare("SELECT geslacht, SUM(totaal_voorkomen*LENGTH(voornaam))  / SUM(totaal_voorkomen) GemiddeldeM FROM `voornamen` GROUP BY geslacht");
    $sql_avg->execute();
    $result_avg = $sql_avg->fetchAll(PDO::FETCH_ASSOC);

    echo "De gemiddelde lengte van alle meisjesnamen is " . $result_avg[1]['GemiddeldeM'] . " letters.";  
    while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
        echo $result['voornaam']."<br/>" . "Totaal voorkomen: " . $result['totaal_voorkomen'] . "<br>" . '<hr>';
      }






  ?>

    </div>
   <?php


  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
  };
 ?>
  

</body>
</html>