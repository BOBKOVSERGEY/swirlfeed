<?php
include __DIR__ . '/includes/header.php';

/*Уничтожает все данные сессии*/
//session_destroy();

if(isset($_GET['profile_username'])) {
  $username = $_GET['profile_username'];
  $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
  $user_array = mysqli_fetch_assoc($user_details_query);

  $num_friends = (substr_count($user_array['friend_array'], ',')) - 1;

  debug($user_array);
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
              <ul class="list-group">
                <li class="list-group-item">Posts: <?php echo $user_array['num_posts']; ?></li>
                <li class="list-group-item">Likes: <?php echo $user_array['num_likes']; ?></li>
                <li class="list-group-item">Friends: <?php echo $num_friends; ?></li>
              </ul>
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