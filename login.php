<?php
require_once 'includes/init.php';
if($session->is_logged_in()) { redirect_to("news.php"); }

if(isset($_POST['login'])) {

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  $found_user = User::authenticate($username, $password);

  if($found_user) {
    $session->login($found_user);
    redirect_to("news.php");
  } else {
    redirect_to("index.php");
  }

}
?>
