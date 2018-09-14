<?php
require_once __DIR__ . '/config/config.php';

?>
<!doctype html>
<html lang="ru">
<head>
  <link rel="stylesheet" href="/assets/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/css/fontAweasome.css">
  <link rel="stylesheet" href="/assets/css/fonts.css">
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body class="wrapper-iframe-like">
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

$get_likes = mysqli_query($con, "SELECT likes, added_by FROM posts WHERE id='{$post_id}'");
$row = mysqli_fetch_array($get_likes);

$total_likes = $row['likes'];
$user_liked = $row['added_by'];

$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='{$user_liked}'");

$row = mysqli_fetch_array($user_details_query);

$total_user_likes = $row['num_likes'];

// like button
if (isset($_POST['like_button'])) {
  $total_likes++;
  $total_user_likes++;
  $query = mysqli_query($con, "UPDATE posts SET likes='$total_likes' WHERE id='$post_id'");
  $user_likes = mysqli_query($con, "UPDATE users SET num_likes='$total_user_likes' WHERE username='$user_liked'");
  $insert_user = mysqli_query($con, "INSERT INTO likes (username, post_id) VALUES('$userLoggedIn', '$post_id')");
}

// unlike button
if (isset($_POST['unlike_button'])) {
  $total_likes--;
  $total_user_likes--;
  $query = mysqli_query($con, "UPDATE posts SET likes='$total_likes' WHERE id='$post_id'");
  $user_likes = mysqli_query($con, "UPDATE users SET num_likes='$total_user_likes' WHERE username='$user_liked'");
  $insert_user = mysqli_query($con, "DELETE FROM likes WHERE username='$userLoggedIn' AND post_id='$post_id'");
}


$check_query = mysqli_query($con, "SELECT * FROM likes WHERE username='{$userLoggedIn}' AND post_id='{$post_id}'");
$num_rows = mysqli_num_rows($check_query);



if ($num_rows > 0) {
  echo '<form action="like.php?post_id=' . $post_id . '" method="post">
          <input type="submit" class="btn" name="unlike_button" value="UnLike">
          <span class="badge badge-secondary">'. $total_likes .'</span> Likes
        </form>';
} else {
  echo '<form action="like.php?post_id=' . $post_id . '" method="post">
          <input type="submit" class="btn" name="like_button" value="Like">
          <span class="badge badge-secondary">'. $total_likes .'</span> Likes
        </form>';
}

?>
</body>
</html>