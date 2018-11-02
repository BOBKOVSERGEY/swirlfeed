<?php
include __DIR__ . '/includes/header.php';
require __DIR__ . '/init.php';
?>

<div class="container">
 <?php
   $query = mysqli_query($con, "SELECT * FROM friend_request WHERE user_to = '$userLoggedIn'");

   if (mysqli_num_rows($query) == 0) {
      echo "You have no friend requests at this time";
   } else {
     while ($row = mysqli_fetch_array($query)) {
       $userFrom = $row['user_from'];
       $userFromObj = new User($con, $userFrom);

       echo $userFromObj->getFirstAndLastName() . ' sent you a friend request';

       $userFromFriendArray = $userFromObj->getFriendArray();

       if (isset($_POST['accept_request' . $userFrom] )) {
          $addFriendQuery = mysqli_query($con, "UPDATE users SET friend_array = CONCAT(friend_array, '$userFrom,') WHERE username = '$userLoggedIn'");
          $addFriendQuery = mysqli_query($con, "UPDATE users SET friend_array = CONCAT(friend_array, '$userLoggedIn,') WHERE username = '$userFrom'");

          $deleteQuery = mysqli_query($con, "DELETE FROM friend_request WHERE user_to='$userLoggedIn' AND user_from = '$userFrom'");
          echo "You are now friends!";
          header("Location: requests.php");
       }

       if (isset($_POST['ignore_request'. $userFrom] )) {
         debug($_POST); die;
         $deleteQuery = mysqli_query($con, "DELETE FROM friend_request WHERE user_to='$userLoggedIn' AND user_from = '$userFrom'");
         echo "Request ignored!";
         header("Location: requests.php");
       }
       ?>
       <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
         <input type="submit" name="accept_request<?php echo $userFrom; ?>" class="btn btn-success" value="Accept">
         <input type="submit" name="ignore_request<?php echo $userFrom; ?>" class="btn btn-warning" value="Ignore">
       </form>
       <?php

     }
   }
 ?>
</div>
