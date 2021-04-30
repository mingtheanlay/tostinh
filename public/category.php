<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<!-- Page Content -->
<div class="container">
    <!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">
        <h1>Feature</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non
            incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        <p><a class="btn btn-primary btn-large">Call to action!</a>
        </p>
    </header>
    <hr>
    <!-- Title -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Latest Products </h3>
        </div>
    </div>
    <!-- Page Features -->
    <div class="row text-center">
        <?php
        get_product_in_cat_page($_GET["id"]);
        ?>
    </div>
</div>

<!-- Footer here -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>