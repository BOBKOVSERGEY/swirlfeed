<script src="assets/js/lib.js"></script>
<script src="assets/js/main.js"></script>
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
</body>
</html>