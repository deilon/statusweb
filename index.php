<?php require_once 'includes/init.php'; ?>
<?php if($session->is_logged_in()) { redirect_to("news.php"); } ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Status Web</title>
  <link rel="stylesheet" type="text/css" href="stylesheet/reset.css">
  <link rel="stylesheet" type="text/css" href="stylesheet/index.css">
  <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
</head>
<body>
<div class="wrap-all">

  <div id="welcome-message">
    <h1>Welcome to Status Web</h1>
    <p>What's in your mind?</p>
  </div>

  <div id="user-form">

    <div id="form-input">
      <div id="signup-form" class="form-all">
        <div class="form-header">
          <h2>Create Your Account</h2>
        </div>
        <form action="signup.php" method="post">
          <div class="input"><input type="text" name="firstname" placeholder="First name"></div>
          <div class="input"><input type="text" name="lastname" placeholder="Last name"></div>
          <div class="input"><input type="text" name="username" placeholder="Username"></div>
          <div class="input"><input type="password" name="password" placeholder="Password"></div>
          <div class="input">
            <input type="submit" name="signup" value="Sign up">
            <div class="redirect_to_form">
              <!--<p>Have an account? <a id="redirect_login" href="">Log in</a></p>-->
            </div>
          </div>
        </form>
      </div>
      <div id="login-form" class="form-all">
        <div class="form-header">
          <h2>Log in</h2>
        </div>
        <form action="login.php" method="post">
          <div class="input"><input type="text" name="username" placeholder="Username"></div>
          <div class="input"><input type="password" name="password" placeholder="Password"></div>
          <div class="input">
            <input type="submit" name="login" value="Log in">
            <div class="redirect_to_form">
              <!--<p>Don't have an account? <a id="redirect_signup" href="">Sign up</a></p>-->
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>

</div>
</body>
</html>
<?php $database->close_connection(); ?>
