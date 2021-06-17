<h1 class="page-header">
    Reports
</h1>
<h4 class="text-success">
    <?php show_message(); ?>
</h4>
<table class="table table-hover">
    <thead style="background-color: gray; color: white; ">
        <tr>
            <th>Report ID</th>
            <th>Product ID</th>
            <th>Order ID</th>
            <th>Product Title</th>
            <th>Product Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php report() ?>
    </tbody>
</table>