<?php

abstract class Totorm {
  // Singleton
  private static $pdo = null;

  protected static function connect() {
    if(isset(self::$pdo)) {
      return self::$pdo;
    } else {
      
      $path = "mysql:host=" . $_ENV['DB_HOST'] . ":" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=utf8";

      self::$pdo = 	
        new PDO(
          $path, 
          $_ENV['DB_USERNAME'], 
          $_ENV['DB_PASSWORD']
        );
  
      return self::$pdo;
    }
  }

  protected function __construct() {
    $this->table = get_called_class();
  }

  public function save() {
    $db = self::connect();
    $db->query($this->insertRequest());
  }

  public function insertRequest() { 
    $data = get_object_vars($this);
    unset($data['table']);

    $v = array_values($data);
    $values = join("','", $v);
    
    $keys = array_keys($data);
    $columns = join(",", $keys);

    // 'INSERT INTO Pokemon(table,nickname,password)'
    return "INSERT INTO {$this->table}({$columns}) VALUES('{$values}')";
  }
}
