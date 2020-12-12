<?php require_once 'includes/init.php'; ?>
<?php

  if(isset($_POST['comment'])) {

    $user_post_id     = trim($_POST['user_post_id']);
    $user_comment_id  = trim($_POST['user_comment_id']);
    $comment_text     = trim($_POST['comment_text']);

    $new_comment = Comment::create_comment($user_post_id, $user_comment_id, $comment_text);

    if($new_comment) {
      $new_comment->create();
      redirect_to("news.php");
    }

  } else {
    redirect_to("news.php");
  }

?>
