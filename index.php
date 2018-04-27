<?php
include __DIR__ . '/includes/header.php';

/*Уничтожает все данные сессии*/
//session_destroy();
?>
<section class="user-details">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="user-details__block">
          <div class="user-details__main-img p-3">
            <a href="#"><img src="<?php echo $user['profile_pic']?>" alt=""></a>
          </div>
        </div>
      </div>
      <div class="col-md-9">

      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php';?>