<?php
ob_start();
error_reporting(-1);
session_start();

function debug($array) {
  echo "<pre>";
  print_r($array);
  echo "</pre>";
}

$timeZone = date_default_timezone_get("Europe/Moscow");

$con = mysqli_connect("localhost", "root", "", "swirlfeed");

if (mysqli_connect_errno()) {
  echo "Нет соединения с БД: " . mysqli_connect_errno();
}

function sanitizeString($var)
{
  global $con;
  $var = strip_tags($var);
  $var = htmlentities($var);
  $var = stripcslashes($var);
  $var = trim($var);
  return $con->real_escape_string($var);
}