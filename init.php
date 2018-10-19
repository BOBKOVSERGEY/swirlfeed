<?php
spl_autoload_register(function($className) {
  require __DIR__ . '/includes/classes/' . $className . '.php';
});