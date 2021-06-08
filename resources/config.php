<?php
ob_start();
session_start();
//session_destroy();
// Define directory
defined("DS") ? null : DEFINE("DS", DIRECTORY_SEPARATOR);
defined("FRONTEND_TEMPLATE") ? null : DEFINE("FRONTEND_TEMPLATE", __DIR__ .  DS .  "templates/front");
defined("BACKEND_TEMPLATE") ? null : DEFINE("BACKEND_TEMPLATE", __DIR__ . DS .  "templates/back");
defined("UPLOAD_DIRECTORY") ? null : DEFINE("UPLOAD_DIRECTORY", __DIR__ . DS .  "uploads");
// Define Database
defined("DB_HOST") ? null : DEFINE("DB_HOST", "localhost");
defined("DB_USER") ? null : DEFINE("DB_USER", "root");
defined("DB_PASS") ? null : DEFINE("DB_PASS", "root");
defined("DB_NAME") ? null : DEFINE("DB_NAME", "ecom_db");
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
require_once("functions.php");
require_once("cart.php");