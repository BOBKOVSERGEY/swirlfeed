<?php
require_once __DIR__ . '/config/config.php';

include __DIR__ . '/includes/classes/User.php';
include __DIR__ . '/includes/classes/Post.php';
?>
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

  $insert_post = mysqli_query($con, "INSERT INTO comments VALUES (null, '$post_body', '$userLoggedIn', '$posted_to', '$date_time_now', 'no', '$post_id')");

  echo "<p>Комментарий добавлен!</p>";
}
debug($row);

?>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>?post_id=<?php echo $post_id; ?>" id="comment_form" name="postComment<?php echo $post_id; ?>" method="post">
    <div class="form-group">
      <textarea name="post_body" class="form-control" rows="3" placeholder="Ввседите комментарий"></textarea>
    </div>
    <button type="submit" name="postComment<?php echo $post_id; ?>"  class="btn btn-primary">Комментировать</button>
  </form>

