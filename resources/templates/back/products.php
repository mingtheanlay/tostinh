<h1 class="page-header">
    All Products
</h1>
<h4 class="text-success">
    <?php show_message(); ?>
</h4>
<table class="table table-hover">
    <thead style="background-color: gray; color: white; ">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Preview</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php get_product_admin() ?>
    </tbody>
</table>