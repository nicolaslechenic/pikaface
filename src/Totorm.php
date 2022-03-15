<?php

abstract class Totorm {
  // Singleton
  private static $pdo = null;

  private static function connect() {
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

  public static function clean() {
    $db = self::connect();
    $kls = get_called_class();
    $db->query("DELETE FROM {$kls}");
  }

  public static function all() {
    $db = self::connect();
    $kls = get_called_class();
    $req = $db->query("SELECT * FROM {$kls}");

    return $req->fetchAll();
  }

  protected function __construct() {
    $this->table = get_called_class();
  }

  public function save() {
    $db = self::connect();
    $data = get_object_vars($this);
    unset($data['table']);

    $v = array_values($data);
    $values = join("','", $v);
    
    $keys = array_keys($data);
    $columns = join(",", $keys);

    $db->query("INSERT INTO {$this->table}({$columns}) VALUES('{$values}')");
  }
}
