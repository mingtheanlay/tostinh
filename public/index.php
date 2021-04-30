<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Category  -->
        <?php include(TEMPLATE_FRONT . DS . "side-nav.php") ?>

        <div class="col-md-9">
            <div class="row carousel-holder">
                <div class="col-md-12">
                    <!-- Carousel -->
                    <?php include(TEMPLATE_FRONT . DS . "slider.php") ?>
                </div>
            </div>

            <div class="row">
                <?php
                get_products();
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>