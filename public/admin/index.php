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
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Dashboard <small>Statistics Overview</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </li>
                </ol>
            </div>
        </div>
        <?php
        if ($_SERVER['REQUEST_URI'] == "/tostinh/public/admin/" || $_SERVER['REQUEST_URI'] == "/tostinh/public/admin/index.php") {
            include(BACKEND_TEMPLATE . "/dashboard.php");
        }
        if (isset($_GET['orders'])) {
            include(BACKEND_TEMPLATE . "/orders.php");
        }
        if (isset($_GET['add'])) {
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