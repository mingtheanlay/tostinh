<?php
if (isset($_GET['id'])) {
    $qt =  "SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']) . " ";
    $send_query = run_query($qt);
    confirm_query($send_query);
    while ($row = fetch_array($send_query)) {
        $product_title = escape_string($row['product_title']);
        $product_category_id = escape_string($row['product_category_id']);
        $product_price = escape_string($row['product_price']);
        $product_description = escape_string($row['product_description']);
        $short_desc = escape_string($row['product_short_description']);
        $product_quantity = escape_string($row['product_quantity']);
        $product_image = display_image(escape_string($row['product_image']));
    }
    update_product();
}

?>
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            Edit Product
        </h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8">
            <div class="form-group">
                <label for="product-title">Product Title</label>
                <input type="text" name="product_title" class="form-control" value="<?php echo $product_title ?> ">
            </div>
            <div class="form-group">
                <label for="product_description">Product Description</label>
                <textarea name="product_description" id="" cols="30" rows="10"
                    class="form-control"><?php echo $product_description ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
            </div>
        </div>
        <!--Main Content-->
        <!-- SIDEBAR-->
        <aside id="admin_sidebar" class="col-md-4">
            <!-- Product Tags -->
            <div class="form-group">
                <label for="short_desc">Product Short Description</label>
                <textarea name="short_desc" class="form-control" rows="5"><?php echo $short_desc ?></textarea>
            </div>
            <hr>
            <!-- Product Categories-->
            <div class="form-group">
                <label for="product_category_id">Product Category</label>
                <select name="product_category_id" id="" class="form-control">
                    <option value="" disabled>
                        Select Category</option>
                    <option value="<?php echo $product_category_id ?>" hidden>
                        <?php echo fetch_categories_for_product($product_category_id) ?></option>
                    <?php fetch_categories() ?>
                </select>
            </div>
            <!-- Product Brands-->
            <div class="form-group">
                <label for="product_quantity">Product Quantity</label>
                <input type="number" name="product_quantity" class="form-control"
                    value="<?php echo $product_quantity ?>">
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="product-price">Product Price</label>
                    <input type="number" name="product_price" class="form-control" size="60"
                        value="<?php echo $product_price ?>">
                </div>
                <!-- Product Image -->
                <div class="col-sm-6">
                    <label for="product-image">Product Image</label>
                    <img src="../../resources/<?php echo $product_image ?>" alt="" width="200">
                    <input type="file" name="product_image">
                </div>
            </div>
        </aside>
        <!--SIDEBAR-->
    </form>