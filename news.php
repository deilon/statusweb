<?php include_once 'layout/header.php'; ?>
<?php if(!$session->is_logged_in()) { redirect_to("index.php"); } ?>

<div id="news-body">
<div id="news-content">

  <div id="sidebar">
    <h3>Side bar options</h3>
  </div>

<div id="all-post">

  <h3>Posts</h3>

  <div class="post">
    <form action="send_post.php" method="post">
      <textarea placeholder="What's in your mind?" name="post"></textarea>
      <input type="hidden" name="user_id" value="<?php echo $session->user_id; ?>">
      <input type="submit" name="post_status" value="Post">
    </form>
  </div>

  <?php
    $sql = "SELECT * FROM posts ORDER BY id DESC";
    $set_posts = mysqli_query($connection, $sql);
  ?>

  <?php
    while($post = mysqli_fetch_assoc($set_posts)):
  ?>

  <div class="post-lists">
  
    <div class="post-section">
      <div class="post-identity">
        <div class="user-post-photo"></div>
          <?php
            $post_name = "SELECT * FROM users WHERE id = {$post['user_id']}";
            $users_name_query = mysqli_query($connection, $post_name);
          ?>
          <?php
            while($username_row = mysqli_fetch_assoc($users_name_query)):
          ?>
        <div class="user-post-name">
          <p><?php echo $username_row['firstname'].' '.$username_row['lastname']; ?></p>
        </div>
          <?php endwhile; ?>
      </div>
      <div class="user-post">
        <p><?php echo $post['post']; ?></p>
      </div>
    </div>

    <?php
      $comments_set = "SELECT * FROM comments WHERE post_id = {$post['id']}";
      $comments_query = mysqli_query($connection, $comments_set);
     ?>
     <?php
      while($comment_row = mysqli_fetch_assoc($comments_query)):
     ?>
    <div class="comment-section">
      <div class="comment-identity">
        <div class="user-comment-photo"></div>
          <?php
            $comment_name = "SELECT * FROM users WHERE id = {$comment_row['user_id']}";
            $comment_name_query = mysqli_query($connection, $comment_name);
            $comment_name_row = mysqli_fetch_assoc($comment_name_query);
           ?>
        <div class="user-comment-name"><?php echo $comment_name_row['firstname'].' '.$comment_name_row['lastname']; ?></div>

        <div class="comment">
          <p><?php echo $comment_row['comment']; ?></p>
        </div>
      </div>
    </div>
    <?php endwhile;?>


    <div class="comment-input">
      <div class="user-comment-photo-2"></div>
      <form action="send_comment.php" method="post">
        <input type="hidden" name="user_post_id" value="<?php echo $post['id']; ?>">
        <input type="hidden" name="user_comment_id" value="<?php echo $session->user_id; ?>">
        <input type="text" name="comment_text" placeholder="Write a comment" autocomplete="off">
        <input type="submit" name="comment" value="Comment">
      </form>
    </div>
  </div>
  <?php endwhile; ?>

</div>

</div>
</div>

</div>
</body>
</html>
