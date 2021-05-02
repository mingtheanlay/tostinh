<?php require_once("../resources/config.php"); ?>
<?php include(FRONTEND_TEMPLATE . DS . "header.php") ?>
<!-- Page Content -->
<div class="container">
    <!-- /.row -->
    <div class="row">
        <h1>Checkout</h1>
        <h4 class="text-danger"><?php show_message(); ?></h4>
        <form action="">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub-total</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php cart(); ?>
                </tbody>
            </table>
        </form>
        <!--  ***********CART TOTALS*************-->
        <div class="col-xs-4 pull-right ">
            <h2>Cart Totals</h2>
            <table class="table table-bordered" cellspacing="0">
                <tr class="cart-subtotal">
                    <th>Items:</th>
                    <td><?php get_total_quantity(); ?> </td>
                </tr>
                <tr class="shipping">
                    <th>Shipping and Handling</th>
                    <td>Free Shipping</td>
                </tr>
                <tr class="order-total">
                    <th>Order Total</th>
                    <td><strong><span class="amount"><?php get_total_price(); ?></span></strong> </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Footer -->
<?php include(FRONTEND_TEMPLATE . DS . "footer.php") ?>