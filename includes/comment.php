<?php

class Comment extends DatabaseObject {

  protected static $table_name = 'comments';
  protected static $db_fields = array('post_id', 'user_id', 'comment', 'created');

  public $post_id;
  public $user_id;
  public $comment;
  public $created;

  public static function create_comment($post_id, $user_id, $user_comment) {
    if(!empty($post_id) && !empty($user_id) && !empty($user_comment)) {
      $comment          = new Comment();
      $comment->post_id = (int)$post_id;
      $comment->user_id = (int)$user_id;
      $comment->comment = $user_comment;
      $comment->created = strftime("%Y-%m-%d %H:%M:%S", time());
      return $comment;
    } else {
      return false;
    }
  }


}

?>
