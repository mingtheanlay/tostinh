<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            All Orders
        </h1>
        <h4 class="text-success">
            <?php show_message(); ?>
        </h4>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead style="background-color: gray; color: white;">
                <tr>
                    <th>Order ID</th>
                    <th>Total Price</th>
                    <th>Transaction</th>
                    <th>Currency</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php display_orders() ?>
            </tbody>
        </table>
    </div>
</div>