<?php

class TrainerSanitizer {
  private $firstname;
  private $lastname;
  private $email;

  public function __construct($data) {
    $this->firstname = $data['firstname'];
    $this->lastname = $data['lastname'];
    $this->email = $data['email'];
  }

  public function call() {
    return [
      'firstname' => htmlentities($this->firstname),
      'lastname' => htmlentities($this->lastname),
      'email' => htmlentities($this->email)
    ];
  }
}

