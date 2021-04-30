<?php
ob_start();
session_start();
// Define directory
defined("DS") ? null : DEFINE("DS", DIRECTORY_SEPARATOR);
defined("TEMPLATE_FRONT") ? null : DEFINE("TEMPLATE_FRONT", __DIR__ .  DS .  "templates/front");
defined("TEMPLATE_BACK") ? null : DEFINE("TEMPLATE_BACK", __DIR__ . DS .  "templates/back");
// Define Database
defined("DB_HOST") ? null : DEFINE("DB_HOST", "localhost");
defined("DB_USER") ? null : DEFINE("DB_USER", "root");
defined("DB_PASS") ? null : DEFINE("DB_PASS", "root");
defined("DB_NAME") ? null : DEFINE("DB_NAME", "ecom_db");
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
require_once("functions.php");