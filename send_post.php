<?php require_once 'includes/init.php'; ?>
<?php

 if(isset($_POST['post_status'])) {

   $user_id = trim($_POST['user_id']);
   $post    = trim($_POST['post']);

   $create_post = Post::create_post($user_id, $post);

   if($create_post) {
     $create_post->create();
     redirect_to("news.php");
   }

   redirect_to("index.php");

 } else {
   redirect_to("news.php");
 }

?>
