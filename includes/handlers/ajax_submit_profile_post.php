<?php
include __DIR__ . '/../../config/config.php';
include __DIR__ . '/../header.php';
require __DIR__ . '/../../init.php';

if (isset($_POST['post_body'])) {
  $post = new Post($con, $_POST['user_from']);
  $post->submitPost($_POST['post_body'], $_POST['user_to']);
}