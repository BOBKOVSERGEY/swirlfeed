<?php
include __DIR__ . '/includes/header.php';
require __DIR__ . '/init.php';

/*Уничтожает все данные сессии*/
//session_destroy();

if(isset($_GET['profile_username'])) {
  $username = $_GET['profile_username'];
  $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
  $user_array = mysqli_fetch_assoc($user_details_query);

  $num_friends = (substr_count($user_array['friend_array'], ',')) - 1;
}

if (isset($_POST['remove_friend'])) {
  $user = new User($con, $userLoggedIn);
  $user->removeFriend($username);
}

if (isset($_POST['add_friend'])) {
  $user = new User($con, $userLoggedIn);

  $user->sendRequest($username);

}

if (isset($_POST['respond_request'])) {
  header("Location: requests.php");

}
?>
  <section class="user-details">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="user-details__main-img mb-3">
                <img src="<?php echo $user_array['profile_pic']?>" alt="<?php echo $username;?>">
              </div>
              <ul class="list-group mb-3">
                <li class="list-group-item">Posts: <?php echo $user_array['num_posts']; ?></li>
                <li class="list-group-item">Likes: <?php echo $user_array['num_likes']; ?></li>
                <li class="list-group-item">Friends: <?php echo $num_friends; ?></li>
              </ul>
              <div>
                <form action="<?php echo $username?>" method="post">
                    <?php
                    $profile_user_obj = new User($con, $username);

                    if ($profile_user_obj->isClosed()) {
                      header("Location: user_closed.php");
                    }
                    $logged_in_user_obj = new User($con, $userLoggedIn);

                    if ($userLoggedIn != $username) {
                      if ($logged_in_user_obj->isFriend($username)) {
                        echo '<input type="submit" name="remove_friend" class="btn btn-danger" value="Remove Friend"><br>';
                      } else if ($logged_in_user_obj->didReceiveRequest($username)) {
                        echo '<input type="submit" name="respond_request" class="btn btn-warning" value="Respond to request"><br>';
                      } else if ($logged_in_user_obj->didSendRequest($username)) {
                        echo '<input type="submit" name="" class="btn btn-primary" value="Respond Sent"><br>';
                      } else {
                        echo '<input type="submit" name="add_friend" class="btn btn-success" value="Add friend"><br>';
                      }
                    }
                    ?>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-body">
              1
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php';?>