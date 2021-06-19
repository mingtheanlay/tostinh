<?php require_once("../resources/config.php"); ?>
<?php include(FRONTEND_TEMPLATE . DS . "header.php") ?>
<!-- Page Content -->
<div class="container">
    <?php
    get_categories_title()
    ?>
    <hr>
    <!-- Page Features -->
    <div class="row text-center">
        <?php
        get_product_in_cat_page($_GET["id"]);
        ?>
    </div>
</div>

<!-- Footer here -->
<?php include(FRONTEND_TEMPLATE . DS . "footer.php") ?>