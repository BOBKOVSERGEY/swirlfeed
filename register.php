<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "swirlfeed");

if (mysqli_connect_errno()) {
  echo "Нет соединения с БД: " . mysqli_connect_errno();
}

$fname = ""; // имя
$lname = ""; // фамилия
$em = ""; // email
$em2 = ""; // email2
$password = ""; // пароль
$password2 = ""; // пароль2
$date = ""; // дата регистрации
$error_array = [];// Ошибки

if ($_POST['register_button']) {
  // значения формы
  // имя
  $fname = strip_tags($_POST['reg_fname']); // html теги
  //$fname = str_replace(' ', '', $fname); // удаляем пробелы
  $fname = trim($fname); // удаляем пробелы
  $_SESSION['reg_fname'] = $fname; // сохраняем имя в сессию

  // фамилия
  $lname = strip_tags($_POST['reg_lname']); // html теги
  $lname = trim($lname); // удаляем пробелы
  $_SESSION['reg_lname'] = $lname; // сохраняем фамилию в сессию

  // email
  $em = strip_tags($_POST['reg_email']); // html теги
  $em = trim($em); // удаляем пробелы
  $em = ucfirst(strtolower($em)); // преообразует в верхний регистр 1 букву
  $_SESSION['reg_email'] = $em; // сохраняем email в сессию

  // email2
  $em2 = strip_tags($_POST['reg_email2']); // html теги
  $em2 = trim($em2); // удаляем пробелы
  $em2 = ucfirst(strtolower($em2)); // преообразует в верхний регистр 1 букву
  $_SESSION['reg_email2'] = $em2; // сохраняем email2 в сессию

  // password
  $password = strip_tags($_POST['reg_password']); // html теги
  $password2 = strip_tags($_POST['reg_password2']); // html теги

  $date = date("Y-m-d"); // текущая дата

  if ($em == $em2) {
    // промеряем email
    if (filter_var($em, FILTER_VALIDATE_EMAIL)) {
      $em = filter_var($em, FILTER_VALIDATE_EMAIL);

      // Проверяем, если email уже существует
      $e_check = mysqli_query($con, "SELECT email FROM users 
                                                        WHERE email='$em'");

      // считаем число возврашенных строк
      $num_rows = mysqli_num_rows($e_check);

      if ($num_rows > 0) {
        array_push($error_array, "Email уже используется<br>");
      }

    } else {
      array_push($error_array,"Введите корректный email<br>");
    }
  } else {
    array_push($error_array,"Адреса электронной почты не совпадают<br>");
  }

  if (strlen($fname) > 25 || strlen($fname) < 2) {
    array_push($error_array, "Ваше имя должно быть между 2 и 25 символами<br>");
  }

  if (strlen($lname) > 25 || strlen($lname) < 2) {
    array_push($error_array, "Ваша фамилия должна быть между 2 и 25 символами<br>");
  }

  if ($password != $password2) {
    array_push($error_array, "Ваши пароли не совпадают<br>");
  } else {
    if (preg_match('/[^A-Za-z0-9]/', $password)) {
      array_push($error_array, "Ваш пароль может состоять только из латинских символов или чисел<br>");
    }
  }

  if (strlen($password) > 30 || strlen($password) < 5) {
    array_push($error_array, "Ваш пароль должен быть между 5 и 30 символами<br>");
  }
}
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome to SwirlFeed</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <input type="text" name="reg_fname" placeholder="Ваше имя" value="<?php if (isset($_SESSION['reg_fname'])) { echo $_SESSION['reg_fname']; }?>" required>
  <br>
  <?php if (in_array("Ваше имя должно быть между 2 и 25 символами<br>", $error_array)) echo "Ваше имя должно быть между 2 и 25 символами<br>"; ?>
  <input type="text" name="reg_lname" placeholder="Ваше фамилия" value="<?php if (isset($_SESSION['reg_lname'])) { echo $_SESSION['reg_lname']; }?>" required>
  <br>
  <?php if (in_array("Ваша фамилия должна быть между 2 и 25 символами<br>", $error_array)) echo "Ваша фамилия должна быть между 2 и 25 символами<br>"; ?>
  <input type="email" name="reg_email" placeholder="Ваш email" value="<?php if (isset($_SESSION['reg_email'])) { echo $_SESSION['reg_email']; }?>" required>
  <br>
  <input type="email" name="reg_email2" placeholder="Повторите email" value="<?php if (isset($_SESSION['reg_email2'])) { echo $_SESSION['reg_email2']; }?>" required>
  <br>
  <?php if (in_array("Email уже используется<br>", $error_array)) echo "Email уже используется<br>";
        else if (in_array("Введите корректный email<br>", $error_array)) echo "Введите корректный email<br>";
        else if (in_array("Адреса электронной почты не совпадают<br>", $error_array)) echo "Адреса электронной почты не совпадают<br>"; ?>
  <input type="password" name="reg_password" placeholder="Пароль" required>
  <br>
  <input type="password" name="reg_password2" placeholder="Повторите пароль" required>
  <br>
  <?php if (in_array("Ваши пароли не совпадают<br>", $error_array)) echo "Ваши пароли не совпадают<br>";
  else if (in_array("Ваш пароль может состоять только из латинских символов или чисел<br>", $error_array)) echo "Ваш пароль может состоять только из латинских символов или чисел<br>";
  else if (in_array("Ваш пароль должен быть между 5 и 30 символами<br>", $error_array)) echo "Ваш пароль должен быть между 5 и 30 символами<br>"; ?>
  <input type="submit" name="register_button" value="Зарегистрироваться">
</form>
</body>
</html>