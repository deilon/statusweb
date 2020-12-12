<?php

class Session {

  private $logged_in = false;
  public $user_id;
  public $firstname;
  public $lastname;

  function __construct() {
    session_start();
    $this->check_login();
  }

  public function login($id) {
    if($id) {
      $this->user_id = $_SESSION['user_id']     = $id['id'];
      $this->logged_in = true;
      $this->firstname = $_SESSION['firstname'] = $id['firstname'];
      $this->lastname  = $_SESSION['lastname']  = $id['lastname'];
    }
  }

  public function is_logged_in() {
    return $this->logged_in;
  }

  private function check_login() {
    if(isset($_SESSION['user_id'])) {
      $this->user_id = $_SESSION['user_id'];
      $this->logged_in = true;
      $this->firstname = $_SESSION['firstname'];
      $this->lastname = $_SESSION['lastname'];
    } else {
      unset($this->user_id);
      $this->logged_in = false;
    }
  }

  public function logout() {
    if(isset($_SESSION['user_id'])) {
      unset($_SESSION['user_id']);
      unset($this->user_id);
      $this->logged_in = false;
    }
  }

}
$session = new Session();

?>
