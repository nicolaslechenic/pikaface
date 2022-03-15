<?php
  require('vendor/autoload.php');

  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();


  if(isset($_POST['firstname']) && isset($_POST['lastname'])) {
    require_once('./src/Trainer.php');
    require_once('./src/TrainerSanitizer.php');

    $sanitizedData = new TrainerSanitizer($_POST);
    $trainer = new Trainer($sanitizedData->call());
    var_dump($_POST);

    $trainer->save();

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="trainer.php" method="post">
    <input type="text" name="firstname">
    <input type="text" name="lastname">
    <input type="text" name="email">
    <input type="submit" value="Envoyer">
  </form>
</body>
</html>