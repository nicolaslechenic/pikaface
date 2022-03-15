<?php

require_once('./src/Totorm.php');

class Trainer extends Totorm {
  protected $firstname;
  protected $lastname;
  protected $email;

  public function __construct($data) {
    parent::__construct();
    $this->firstname = $data['firstname'];
    $this->lastname = $data['lastname'];
    $this->email = $data['email'];
  }
}
