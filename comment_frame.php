<?php
require_once __DIR__ . '/config/config.php';

include __DIR__ . '/includes/classes/User.php';
include __DIR__ . '/includes/classes/Post.php';
?>
<!doctype html>
<head>
  <link rel="stylesheet" href="/assets/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/css/fontAweasome.css">
  <link rel="stylesheet" href="/assets/css/fonts.css">
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body class="wrapper-iframe">

<?php
if (isset($_SESSION['username'])) {
  $userLoggedIn = $_SESSION['username'];

  $userLoggedIn = mysqli_real_escape_string($con, $userLoggedIn);
  $sql = "SELECT * FROM users WHERE username='$userLoggedIn'";
  $user_details_query = mysqli_query($con, $sql);

  $user = mysqli_fetch_array($user_details_query);

} else {
  header("Location: /register.php");
}

if (isset($_GET['post_id'])) {
  $post_id = $_GET['post_id'];
}

$user_query = mysqli_query($con, "SELECT added_by, user_to FROM posts WHERE id='$post_id'");
$row = mysqli_fetch_array($user_query);

$posted_to = $row['added_by'];

if (isset($_POST['postComment' . $post_id])) {
  $post_body = $_POST['post_body'];
  $post_body = sanitizeString($post_body);
  $date_time_now = date("Y-m-d H:i:s");
  if ($post_body) {
    $insert_post = mysqli_query($con, "INSERT INTO comments VALUES (null, '$post_body', '$userLoggedIn', '$posted_to', '$date_time_now', 'no', '$post_id')");
    echo "<p>Комментарий добавлен!</p>";
  } else {
    echo "<p>Введите что нибудь!</p>";
  }



}

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?post_id=<?php echo $post_id; ?>" id="comment_form" name="postComment<?php echo $post_id; ?>" method="post">
  <div class="form-group mb-3">
    <textarea name="post_body" class="form-control" rows="3" placeholder="Введите комментарий"></textarea>
  </div>
  <button type="submit" name="postComment<?php echo $post_id; ?>"  class="btn btn-info btn-sm">Комментировать</button>
</form>

<?php
$get_comments = mysqli_query($con, "SELECT * FROM comments WHERE post_id = '$post_id' ORDER BY id DESC");
$count = mysqli_num_rows($get_comments);

if ($count != 0) {
  while ($comment = mysqli_fetch_assoc($get_comments)) {
    //debug($comment);
    $comment_body = $comment['post_body'];
    $posted_to = $comment['posted_to'];
    $posted_by = $comment['posted_by'];
    $date_added = $comment['date_added'];
    $removed = $comment['removed'];

    // timeframe
    $date_time_now = date("Y-m-d H:i:s");
    $start_date = new DateTime($date_added); //Time of post
    $end_date = new DateTime($date_time_now); //Current time
    $interval = $start_date->diff($end_date); //Difference between dates
    if ($interval->y >= 1) {
      if ($interval == 1)
        $time_message = $interval->y . " year ago"; //1 year ago
      else
        $time_message = $interval->y . " years ago"; //1+ year ago
    } else if ($interval->m >= 1) {
      if ($interval->d == 0) {
        $days = " ago";
      } else if ($interval->d == 1) {
        $days = $interval->d . " day ago";
      } else {
        $days = $interval->d . " days ago";
      }


      if ($interval->m == 1) {
        $time_message = $interval->m . " month " . $days;
      } else {
        $time_message = $interval->m . " months " . $days;
      }

    } else if ($interval->d >= 1) {
      if ($interval->d == 1) {
        $time_message = "Yesterday";
      } else {
        $time_message = $interval->d . " days ago";
      }
    } else if ($interval->h >= 1) {
      if ($interval->h == 1) {
        $time_message = $interval->h . " hour ago";
      } else {
        $time_message = $interval->h . " hours ago";
      }
    } else if ($interval->i >= 1) {
      if ($interval->i == 1) {
        $time_message = $interval->i . " minute ago";
      } else {
        $time_message = $interval->i . " minutes ago";
      }
    } else {
      if ($interval->s < 30) {
        $time_message = "Just now";
      } else {
        $time_message = $interval->s . " seconds ago";
      }
    }
    // end time frame

    $user_obj = new User($con, $posted_by);

    ?>

    <div class="comment_section">
      <div class="d-flex mt-3 align-items-center">
        <a href="<?php if (!empty($posted_by)) { echo $posted_by; } ?>" target="_parent" style="text-decoration: none; margin-right: 10px;"><img src="<?php echo $user_obj->getProfilePic(); ?>" title="" alt="" style="width: 30px; border-radius: 50%;"></a>
        <a href="<?php if (!empty($posted_by)) { echo $posted_by; } ?>" target="_parent" style="text-decoration: none; margin-right: 10px;"><?php echo $user_obj->getFirstAndLastName(); ?></a>
        <span><?php echo $time_message; ?></span>
      </div>
      <div class="mb-3">
        <?php echo $comment_body?>
      </div>

    </div>

    <?php

  }
}
?>
</body>
</html>




