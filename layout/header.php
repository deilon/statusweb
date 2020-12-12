<?php require_once 'includes/init.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf8">
  <title>News</title>
  <link rel="stylesheet" type="text/css" href="stylesheet/reset.css">
  <link rel="stylesheet" type="text/css" href="stylesheet/news.css">
  <link rel="stylesheet" type="text/css" href="stylesheet/profile.css">
</head>
<body>
<div class="wrap-all">
  <div id="navigation-top">
    <div id="navigation-top-content">
      <div class="page-title">
        <h1>News</h1>
      </div>
      <div id="identity">
        <div id="image"></div>
        <h2> &nbsp;|&nbsp; <a href="logout.php">Log out</a></h2>
        <h2> &nbsp;|&nbsp; <a href="news.php">Home</a></h2>
        <h2><a href="profile.php"><?php echo $user->full_name();  ?></a></h2>
      </div>
    </div>
  </div>
