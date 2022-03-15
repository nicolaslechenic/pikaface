<?php

require_once('./src/Totorm.php');

class Pokemon extends Totorm {
  protected $nickname;
  protected $password;

  public function __construct($data) {
    parent::__construct();
    $this->nickname = $data['nickname'];
    $this->password = $data['password'];
  }

  public function hello() {
    return "Hello";
  }

  public function isConnected() {
    return $this->password === 'pikapika' && $this->nickname === 'Pikachu';
  }
}
