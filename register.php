<?php

$fname = ""; // имя
$lname = ""; // фамилия
$em = ""; // email
$em2 = ""; // email2
$password = ""; // пароль
$password2 = ""; // пароль2
$date = ""; // дата регистрации
$error_array = "";// Ошибки

if ($_POST['register_button']) {
  // значения формы
  // имя
  $fname = strip_tags($_POST['reg_fname']); // html теги
  //$fname = str_replace(' ', '', $fname); // удаляем пробелы
  $fname = trim($fname); // удаляем пробелы
  $fname = ucfirst(strtolower($fname)); // преообразует

  // фамилия
  $lname = strip_tags($_POST['reg_lname']); // html теги
  $lname = trim($lname); // удаляем пробелы
  $lname = ucfirst(strtolower($lname)); // преообразует

  // email
  $em = strip_tags($_POST['reg_email']); // html теги
  $em = trim($em); // удаляем пробелы
  $em = ucfirst(strtolower($em)); // преообразует в верхний регистр 1 букву

  // email2
  $em2 = strip_tags($_POST['reg_email2']); // html теги
  $em2 = trim($em2); // удаляем пробелы
  $em2 = ucfirst(strtolower($em2)); // преообразует в верхний регистр 1 букву

  // password
  $password = strip_tags($_POST['reg_password']); // html теги
  $password2 = strip_tags($_POST['reg_password2']); // html теги

  $date = date("Y-m-d"); // текущая дата
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
  <input type="text" name="reg_fname" placeholder="Ваше имя" required>
  <br>
  <input type="text" name="reg_lname" placeholder="Ваше фамилия" required>
  <br>
  <input type="email" name="reg_email" placeholder="Ваш email" required>
  <br>
  <input type="email" name="reg_email2" placeholder="Повторите email" required>
  <br>
  <input type="password" name="reg_password" placeholder="Пароль" required>
  <br>
  <input type="password" name="reg_password2" placeholder="Повторите пароль" required>
  <br>
  <input type="submit" name="register_button" value="Зарегистрироваться">
</form>
</body>
</html>