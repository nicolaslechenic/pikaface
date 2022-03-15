abstract class Totorm {
  protected function __construct() {
    $this->table = get_called_class();
  }

  public function insert() {
    $keys = array_keys(get_class_vars($this->table));
    $v = []; 
    
    foreach($keys as $key) {
      array_push($v, $this->$key); 
    };

    $columns = join(',', $keys);
    $values = join("','", $v);


    return "INSERT INTO {$this->table}({$columns}) VALUES ('{$values}')";
  }
}