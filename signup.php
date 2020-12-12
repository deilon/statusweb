<?php
require_once 'includes/init.php';

if(isset($_POST['signup'])) {

  $firstname  = ucfirst(trim($_POST['firstname']));
  $lastname   = ucfirst(trim($_POST['lastname']));
  $username   = trim($_POST['username']);
  $password   = trim($_POST['password']);

  $user_exists = User::user_exists($username);

  // Check if username exists before creating new user
  if(!$user_exists) {
    $create_user = User::create_user($firstname, $lastname, $username, $password);
    if($create_user) {
      $create_user->create();
      redirect_to("index.php");
    } else {
      $error_message = "Could not create users";
      redirect_to("index.php");
    }
  } else {
    $error_message = "User already exist";
    redirect_to("index");
  }

} else {
  redirect_to("index.php");
}

 ?>
