<?php

class PokemonSanitizer {
  private $nickname;
  private $password;

  public function __construct($data) {
    $this->nickname = $data['nickname'];
    $this->password = $data['password'];
  }

  public function call() {
    return [
      'nickname' => htmlentities($this->nickname),
      'password' => htmlentities($this->password)
    ];
  }
}

