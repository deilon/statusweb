<?php
require_once 'init.php';

class Post extends DatabaseObject {

  protected static $table_name = 'posts';
  protected static $db_fields = array('user_id', 'post', 'created');

  public $user_id;
  public $post;
  public $created;

  public static function create_post($id, $user_post) {
    if(!empty($id) && !empty($user_post)) {
      $post           = new Post();
      $post->user_id  = $id;
      $post->post     = $user_post;
      $post->created  = strftime("%Y-%m-%d %H:%M:%S", time());
      return $post;
    } else {
      return false;
    }
  }

}

 ?>
