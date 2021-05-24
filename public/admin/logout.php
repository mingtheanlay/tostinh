<?php
unset($_COOKIE['login']);
setcookie("login", null, -1, '/');
session_start();
session_destroy();
header("Location: ../../public");