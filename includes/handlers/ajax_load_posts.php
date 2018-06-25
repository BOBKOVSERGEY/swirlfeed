<?php
include __DIR__ . '/../../config/config.php';
include __DIR__ . '/../classes/User.php';
include __DIR__ . '/../classes/Post.php';

$limit = 10; // number of posts to be loaded per call
$posts = new Post($con, stripcslashes($_REQUEST['userLoggedIn']));
$posts->loadPostsFriends($_REQUEST, $limit);