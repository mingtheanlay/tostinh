<?php require_once("../resources/config.php"); ?>
<?php include(FRONTEND_TEMPLATE . DS . "header.php") ?>
<div class="container">
    <div class="row">
        <!-- Category  -->
        <?php include(FRONTEND_TEMPLATE . DS . "side-nav.php") ?>
        <div class="col-md-9">
            <div class="row carousel-holder">
                <div class="col-md-12">
                    <!-- Carousel -->
                    <?php include(FRONTEND_TEMPLATE . DS . "slider.php") ?>
                </div>
            </div>
            <!-- Show product -->
            <div class="row">
                <?php
                get_products();
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<?php include(FRONTEND_TEMPLATE . DS . "footer.php") ?>