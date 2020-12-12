<?php
require_once 'databaseobject.php';

class User extends DatabaseObject {

  protected static $table_name = "users";
  protected static $db_fields = array('firstname', 'lastname', 'username', 'password', 'created');

  public $firstname;
  public $lastname;
  public $username;
  public $password;
  public $created;

  function __construct() {
    $this->set_full_name();
  }

  public function set_full_name() {
    global $session;
    $firstname  = $session->firstname;
    $lastname   = $session->lastname;
    if(!isset($this->firstname) && !isset($this->lastname)) {
      $this->firstname =$firstname;
      $this->lastname =$lastname;
    }
  }

  public function full_name() {
    if(isset($this->firstname) && isset($this->lastname)) {
      return $this->firstname.' '.$this->lastname;
    } else {
      return "";
    }
  }

  public static function create_user($firstname="", $lastname="", $username="", $password="") {
    if(!empty($firstname) && !empty($lastname) && !empty($username) && !empty($password)) {
      $user = new User();
      $user->firstname  = $firstname;
      $user->lastname   = $lastname;
      $user->username   = $username;
      $user->password   = $password;
      $user->created    = strftime("%Y-%m-%d %H:%M:%S", time());
      return $user;
    } else {
      return false;
    }
  }

  public static function authenticate($username, $password) {
    global $session;
    $sql  = "SELECT * FROM users ";
    $sql .= "WHERE username = '{$username}' ";
    $sql .= "AND password = '{$password}' ";
    $sql .= "LIMIT 1";

    $login = static::find_by_sql($sql);
    return !empty($login) ? array_shift($login) : false;
  }

  public static function user_exists($username) {
    global $connection;
    $sql  = "SELECT * FROM users ";
    $sql .= "WHERE username = '{$username}' ";
    $sql .= "LIMIT 1";
    $check_existence = static::find_by_sql($sql);
    return $check_existence;
  }

}

$user = new User();
 ?>
