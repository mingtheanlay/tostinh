<?php require_once("../resources/config.php"); ?>
<?php include(FRONTEND_TEMPLATE . DS . "header.php") ?>
<!-- Page Content -->
<div class="container">
    <header>
        <h1>Shop</h1>
    </header>
    <hr>
    <!-- Page Features -->
    <div class="row text-center">
        <?php
        get_product_in_shop_page();
        ?>
    </div>
</div>

<!-- Footer here -->
<?php include(FRONTEND_TEMPLATE . DS . "footer.php") ?>