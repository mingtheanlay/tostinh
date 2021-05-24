<?php
require_once("../resources/config.php");
?>
<?php include(FRONTEND_TEMPLATE . DS . "header.php") ?>
<!-- Page Content -->
<div class="container">
    <!-- Category  -->
    <?php include(FRONTEND_TEMPLATE . DS . "side-nav.php") ?>
    <?php
    show_individuel_product($_GET["id"]);
    ?>
</div>
<!-- Footer -->
<?php include(FRONTEND_TEMPLATE . DS . "footer.php") ?>