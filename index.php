

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

    $namen = $pdo->prepare("SELECT * FROM 'voornamen' WHERE 1");
    $namen->bindParam(':voornaam', $voornaam);
    $namen->execute(); 
    $namen_array = $namen->fetchAll();

    echo $namen_array;



  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
  };
 ?>
  


</body>
</html>