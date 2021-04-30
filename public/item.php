<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<!-- Page Content -->
<div class="container">
    <!-- Category  -->
    <?php include(TEMPLATE_FRONT . DS . "side-nav.php") ?>
    <?php
    show_individuel_product($_GET["id"]);
    ?>
</div>
<!-- Footer -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>