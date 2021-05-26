<?php
require_once("../../resources/config.php");
?>
<?php
include(BACKEND_TEMPLATE . "/header.php");
?>
<?php

if (!isset($_SESSION['username'], $_COOKIE['login'])) {
    redirect("../../public/login.php");
}
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <?php
        if ($_SERVER['REQUEST_URI'] == "/tostinh/public/admin/" || $_SERVER['REQUEST_URI'] == "/tostinh/public/admin/index.php") {
            include(BACKEND_TEMPLATE . "/dashboard.php");
        }
        if (isset($_GET['orders'])) {
            include(BACKEND_TEMPLATE . "/orders.php");
        }
        if (isset($_GET['add_product'])) {
            include(BACKEND_TEMPLATE . "/add_product.php");
        }
        if (isset($_GET['product'])) {
            include(BACKEND_TEMPLATE . "/products.php");
        }
        if (isset($_GET['categories'])) {
            include(BACKEND_TEMPLATE . "/categories.php");
        }
        if (isset($_GET['user'])) {
            include(BACKEND_TEMPLATE . "/users.php");
        }
        ?>
    </div>
</div>
<!-- /#page-wrapper -->
<?php
include(BACKEND_TEMPLATE . "/footer.php");
?>