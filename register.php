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
  <link rel="stylesheet" href="/assets/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/css/fontAweasome.css">
  <link rel="stylesheet" href="/assets/css/fonts.css">
  <link rel="stylesheet" href="/assets/css/style.css">

</head>
<body>
  <div class="register__bg"></div>
  <div class="login__caption">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <h2 class="register__heading mb-3">Войдите или зарегистрируйтесь ниже!</h2>
          <div class="first">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="form-group">
                <input type="email" class="form-control" name="log_email" value="<?php if (isset($_SESSION['log_email'])) { echo $_SESSION['log_email']; }?>" placeholder="Введите email" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="log_password" placeholder="Введите пароль">
              </div>
              <div class="text-danger">
                <?php if(in_array("Email или пароль некорректны<br>", $error_array)) echo "Email или пароль некорректны<br>"; ?>
              </div>
              <button type="submit" class="btn btn-primary" name="login_button">Войти</button>
              <div class="mt-3"><a href="#" id="signUp" class="signUp">Нужен аккаунт? Зарегистрируйтесь здесь!</a></div>
            </form>
          </div>
          <div class="second mt-3">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="form-group">
                <input type="text" class="form-control" name="reg_fname" placeholder="Ваше имя" value="<?php if (isset($_SESSION['reg_fname'])) { echo $_SESSION['reg_fname']; }?>" required>
                <div class="text-danger"><?php if (in_array("Ваше имя должно быть между 2 и 25 символами<br>", $error_array)) echo "Ваше имя должно быть между 2 и 25 символами<br>"; ?></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="reg_lname" placeholder="Ваше фамилия" value="<?php if (isset($_SESSION['reg_lname'])) { echo $_SESSION['reg_lname']; }?>" required>
                <div class="text-danger">
                  <?php if (in_array("Ваша фамилия должна быть между 2 и 25 символами<br>", $error_array)) echo "Ваша фамилия должна быть между 2 и 25 символами<br>"; ?>
                </div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="reg_email" placeholder="Ваш email" value="<?php if (isset($_SESSION['reg_email'])) { echo $_SESSION['reg_email']; }?>" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="reg_email2" placeholder="Повторите email" value="<?php if (isset($_SESSION['reg_email2'])) { echo $_SESSION['reg_email2']; }?>" required>
                <div class="text-danger">
                  <?php if (in_array("Email уже используется<br>", $error_array)) echo "Email уже используется<br>";
                  else if (in_array("Введите корректный email<br>", $error_array)) echo "Введите корректный email<br>";
                  else if (in_array("Адреса электронной почты не совпадают<br>", $error_array)) echo "Адреса электронной почты не совпадают<br>"; ?>
                </div>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="reg_password" placeholder="Пароль" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="reg_password2" placeholder="Повторите пароль" required>
                <div class="text-danger">
                  <?php if (in_array("Ваши пароли не совпадают<br>", $error_array)) echo "Ваши пароли не совпадают<br>";
                  else if (in_array("Ваш пароль может состоять только из латинских символов или чисел<br>", $error_array)) echo "Ваш пароль может состоять только из латинских символов или чисел<br>";
                  else if (in_array("Ваш пароль должен быть между 5 и 30 символами<br>", $error_array)) echo "Ваш пароль должен быть между 5 и 30 символами<br>"; ?>
                </div>
              </div>
              <button type="submit" class="btn btn-primary" name="register_button">Зарегистрироваться</button>
              <div class="mb-3 mt-3 text-success">
                <?php if (in_array("Вы успешно зарегистрировались", $error_array)) echo "Вы успешно зарегистрировались";?>
              </div>
              <a href="#" id="signIn" class="signIn">Уже есть аккаунт? Войдите здесь!</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include __DIR__ . '/includes/footer.php';?>