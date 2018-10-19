<script src="/assets/js/lib.js"></script>
<script src="/assets/js/main.js"></script>
<?php
if (isset($_POST['register_button'])) {
  echo '
   <script>
    $(function() {
      $(".first").hide();
      $(".second").show();
    });
   </script>
  ';
}
?>
<script>

  var userLoggedIn = '<?php if(isset($userLoggedIn)) echo $userLoggedIn; ?>';
  $(function () {
    $('#loading').show();

    function ajaxRequest() {
      $.ajax({
        url: "../includes/handlers/ajax_load_posts.php",
        type: "POST",
        data:"page=1&userLoggedIn=" + userLoggedIn,
        cache: false,

        success: function (data) {
          $('#loading').hide();
          $('.posts_area').html(data)
        }
      });
    }
    ajaxRequest();
    $(window).scroll(function () {
      var height = $('.posts_area').height();
      //console.log(height);
      var scroll_top = $(this).scrollTop();
      var innerHeight = window.innerHeight;
      //console.log(scroll_top);
      var page = $('.posts_area').find('.nextPage').val();
      var noMorePosts = $('.posts_area').find('.noMorePosts').val();
      console.log('scrollTop' + $(window).scrollTop());
      console.log('height' + $(window).height());
      console.log('documentheight' + $(document).height());
      console.log(page);
      console.log(scroll_top);

      var fullHeight = scroll_top + innerHeight;
      //$(window).scrollTop() + $(window).height() >= $(document).height() - 200
      //$(window).scrollTop() + $(window).height() >= $(document).height() && noMorePosts === 'false'

      if ($(window).scrollTop() + $(window).height() >= ($(document).height() - 200) && noMorePosts === 'false') {


        $('#loading').show();

        var ajaxReq = $.ajax({
          url: "../includes/handlers/ajax_load_posts.php",
          type: "POST",
          data:"page=" + page + "&userLoggedIn=" + userLoggedIn,
          cache: false,

          success: function (response) {
            $('.posts_area').find('.nextPage').remove();
            $('.posts_area').find('.noMorePosts').remove();

            $('#loading').hide();
            $('.posts_area').append(response)
          }
        });

      }

      return false;

    })
  });
</script>
</body>
</html>