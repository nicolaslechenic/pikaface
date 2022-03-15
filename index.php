<?php
  require('vendor/autoload.php');

  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();


  if(isset($_POST['nickname']) && isset($_POST['password'])) {
    require_once('./src/Pokemon.php');
    require_once('./src/PokemonSanitizer.php');

    $sanitizedData = new PokemonSanitizer($_POST);
    $pokemon = new Pokemon($sanitizedData->call());
    $pokemon->save();

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
  <form action="index.php" method="post">
    <input type="text" name="nickname">
    <input type="text" name="password">
    <input type="submit" value="Envoyer">
  </form>
</body>
</html>