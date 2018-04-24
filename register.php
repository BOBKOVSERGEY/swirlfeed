<?php
require __DIR__ . '/config/config.php';
require __DIR__ . '/includes/form_handlers/register_handler.php';
require __DIR__ . '/includes/form_handlers/login_handler.php';
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome to SwirlFeed</title>
  <link rel="stylesheet" href="assets/css/fonts.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/register_style.css">
</head>
<body>

<div class="wrapper">

  <div class="login_box">
    <div class="login_header">
      <h1>
        Swirlfeed!
      </h1>
      <p>Войдите или зарегистрируйтесь ниже!</p>
    </div>
    <div class="first">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="email" name="log_email" value="<?php if (isset($_SESSION['log_email'])) { echo $_SESSION['log_email']; }?>" placeholder="Введите email" required>
        <br>
        <input type="password" name="log_password" placeholder="Введите пароль">
        <br>
        <?php if(in_array("Email или пароль некорректны<br>", $error_array)) echo "Email или пароль некорректны<br>"; ?>
        <input type="submit" name="login_button" value="Войти">
        <br>
        <a href="#" id="signUp" class="signUp">Нужен аккаунт? Зарегистрируйтесь здесь!</a>
      </form>
    </div>
    <div class="second">
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
        <br>
        <?php if (in_array("<span style='color:lightgreen;'>Вы успешно зарегистрировались</span>", $error_array)) echo "<span style='color:lightgreen;'>Вы успешно зарегистрировались</span>";?>
        <a href="#" id="signIn" class="signIn">Уже есть аккаунт? Войдите здесь!</a>
      </form>
    </div>


  </div>
</div>
<?php include __DIR__ . '/includes/footer.php';?>