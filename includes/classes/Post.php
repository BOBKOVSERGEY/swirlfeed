<?php
class Post
{
  private $user_obj;
  private $con;

  public function __construct($con, $user)
  {
    $this->con = $con;
    $this->user_obj = new User($con, $user);
  }

  public function submitPost($body, $user_to)
  {
    $body = sanitizeString($body); // remove html tags
    $check_empty = preg_replace('/\s+/', '', $body); // delete all spaces
    if ($check_empty != "") {
      // current date and time
      $date_added = date("Y-m-d H:i:s");

      // get username
      $added_by = $this->user_obj->getUsername();

      $added_by = mysqli_real_escape_string($this->con, $added_by);
      if ($user_to == $added_by) {
        $user_to = "none";
      }

      // insert post
      $query = "INSERT INTO posts VALUES(null, '$body', '$added_by', '$user_to', '$date_added', 'no', 'no', '0')";
      $res = mysqli_query($this->con, $query);

      $returned_id = mysqli_insert_id($this->con);

      // insert notification

      // Update post count for user

      $num_posts = $this->user_obj->getNumPosts();
      $num_posts++;
      $update_query = mysqli_query($this->con, "UPDATE users SET num_posts='$num_posts' WHERE username='$added_by'");
    }
  }

  public function loadPostsFriends($data, $limit)
  {
    $page = $data['page'];

    $userLoggedIn = $this->user_obj->getUsername();
    $userLoggedIn = mysqli_real_escape_string($this->con, $userLoggedIn);


    if($page == 1)
      $start = 0;
    else
      $start = ($page - 1) * $limit;

    $str = ""; //String to return

    $data_query = mysqli_query($this->con, "SELECT * FROM posts WHERE deleted='no' ORDER BY id DESC");

    if (mysqli_num_rows($data_query) > 0) {

      $num_iterations = 0; //Number of results checked (not necasserily posted)
      $count = 1;

      while ($row = mysqli_fetch_array($data_query)) {
        $id = $row['id'];
        $body = $row['body'];
        $added_by = $row['added_by'];
        $date_time = $row['date_added'];

        if ($row['user_to'] == 'none') {
          $user_to = "";
        } else {
          $user_to_obj = new User($this->con, $row['user_to']);
          $user_to_name = $user_to_obj->getFirstAndLastName();
          $user_to = "to <a href='" . $row['user_to'] . "'>" . $user_to_name . "</a>";
        }

        $added_by_obj = new User($this->con, $added_by);
        if ($added_by_obj->isClosed()) {
          continue;
        }

        $added_by = mysqli_real_escape_string($this->con, $added_by);



        $user_logged_obj = new User($this->con, stripcslashes($userLoggedIn));


        if ($user_logged_obj->isFriend(stripcslashes($added_by))) {

          if($num_iterations++ < $start)
            continue;

          //Once 10 posts have been loaded, break
          if($count > $limit) {
            break;
          }
          else {
            $count++;
          }

          if ($userLoggedIn == $added_by)
            $delete_button = '<button class="btn btn-danger" style="float: right" id="post' . $id . '">&times;</button>';
          else
            $delete_button = '';

          $user_details_query = mysqli_query($this->con, "SELECT first_name, last_name, profile_pic FROM users WHERE username='$added_by'");

          $user_row = mysqli_fetch_array($user_details_query);

          $first_name = $user_row['first_name'];
          $last_name = $user_row['last_name'];
          $profile_pic = $user_row['profile_pic'];

          ?>
          <script>
            function toggle<?php echo $id; ?>() {


                var element = document.getElementById("toggleComment<?php echo $id; ?>");

                if(element.style.display == "block")
                  element.style.display = "none";
                else
                  element.style.display = "block";

            }
          </script>
          <?php

          $comments_check = mysqli_query($this->con, "SELECT * FROM comments WHERE post_id='{$id}'");
          $comments_check_num = mysqli_num_rows($comments_check);

          //Timeframe

          $date_time_now = date("Y-m-d H:i:s");
          $start_date = new DateTime($date_time); //Time of post
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


          $str .= "<div class='card status_post mt-3 p-3' onclick='javascript:toggle" . $id ."()'>
                    <div class='row align-items-center'>
                      <div class='col-md-2'>
                        <div class='post_profile_pic'>
                          <img class='rounded-circle' src='{$profile_pic}' width='50' alt=''>
                        </div>
                      </div>
                      <div class='col-md-10'>
                        <div class='posted_by'>
                          <a href='" . str_replace('\'', '', stripcslashes($added_by)) . "'>$first_name $last_name</a> $user_to &nbsp; $time_message
                          $delete_button
                        </div>
                        <div id='$id' class='mt-2 mb-2'>$body</div>
                        <div class='newsfeedPostOption'>
                          Comments <span class='badge badge-secondary'>{$comments_check_num}</span>
                          <iframe src='like.php?post_id={$id}' frameborder='0' class='iframeLike'></iframe>
                        </div>
                      </div>
                    </div>
                    <div class='post_comment' id='toggleComment" . $id . "' style='display: none;'>
                      <iframe src='comment_frame.php?post_id=" . $id . "' frameborder='0' id='comment_frame' class='frameComment'></iframe>
                    </div>
                 </div>";

        }
        
        ?>
        <script>
          $(function () {
            $('#post<?php echo $id;?>').on('click', function () {
              bootbox.confirm('Are you sure want to delete this post?', function (result) {
                $.post('/includes/form_handlers/delete_post.php?post_id=<?php echo $id; ?>', {result:result});
                if (result) location.reload();
              });
            })
          })
        </script>
        <?php


      } //end while

      if($count > $limit)
        $str .= "<input type='hidden' class='nextPage' value='" . ($page + 1) . "'>
							<input type='hidden' class='noMorePosts' value='false'>";
      else
        $str .= "<input type='hidden' class='noMorePosts' value='true'>
                 <p class='text-center m-3'> No more posts to show! </p>";

    }

    echo $str;
  }

}

?>