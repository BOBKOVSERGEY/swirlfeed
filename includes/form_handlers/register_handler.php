<?php
$fname = ""; // имя
$lname = ""; // фамилия
$em = ""; // email
$em2 = ""; // email2
$password = ""; // пароль
$password2 = ""; // пароль2
$date = ""; // дата регистрации
$error_array = [];// Ошибки

if (isset($_POST['register_button'])) {
// значения формы
// имя

$fname = sanitizeString($_POST['reg_fname']); // html теги
//$fname = str_replace(' ', '', $fname); // удаляем пробелы
$fname = trim($fname); // удаляем пробелы
$_SESSION['reg_fname'] = stripcslashes($fname); // сохраняем имя в сессию

// фамилия
$lname = sanitizeString($_POST['reg_lname']); // html теги
$lname = trim($lname); // удаляем пробелы
$_SESSION['reg_lname'] = stripcslashes($lname); // сохраняем фамилию в сессию

// email
$em = sanitizeString($_POST['reg_email']); // html теги
$em = trim($em); // удаляем пробелы
//$em = ucfirst(strtolower($em)); // преообразует в верхний регистр 1 букву
$_SESSION['reg_email'] = $em; // сохраняем email в сессию

// email2
$em2 = sanitizeString($_POST['reg_email2']); // html теги
$em2 = trim($em2); // удаляем пробелы
//$em2 = $em2; // преообразует в верхний регистр 1 букву
$_SESSION['reg_email2'] = $em2; // сохраняем email2 в сессию

// password
$password = sanitizeString($_POST['reg_password']); // html теги
$password2 = sanitizeString($_POST['reg_password2']); // html теги

$date = date("Y-m-d"); // текущая дата

if ($em == $em2) {
// промеряем email
if (filter_var($em, FILTER_VALIDATE_EMAIL)) {
$em = filter_var($em, FILTER_VALIDATE_EMAIL);


// Проверяем, если email уже существует
$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

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

// если ошибок нет
if(empty($error_array)) {


$password = md5($password); //Encrypt password before sending to database

//Generate username by concatenating first name and last name
$username = $fname . "_" . $lname;
$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");


$i = 0;
//if username exists add number to username
while(mysqli_num_rows($check_username_query) != 0) {
$i++; //Add 1 to i
$username = $username . "_" . $i;
$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
}

//Profile picture assignment
$rand = rand(1, 2); //Random number between 1 and 2

if($rand == 1)
$profile_pic = "assets/images/profile_pics/defaults/head_deep_blue.png";
else if($rand == 2)
$profile_pic = "assets/images/profile_pics/defaults/head_emerald.png";






$sql = "INSERT INTO users VALUES (null, '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')";
$result = mysqli_query($con, $sql);

if (!$result) {
$error = mysqli_error($con);
print("Ошибка Mysql: " . $error);
}

array_push($error_array, "Вы успешно зарегистрировались");

// clear session variables
$_SESSION['reg_fname'] = '';
$_SESSION['reg_lname'] = '';
$_SESSION['reg_email'] = '';
$_SESSION['reg_email2'] = '';

}

}
?>