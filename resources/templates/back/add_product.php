<?php
add_product();
?>
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            Add Product
        </h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8">
            <div class="form-group">
                <label for="product-title">Product Title</label>
                <input type="text" name="product_title" class="form-control">
            </div>
            <div class="form-group">
                <label for="product_description">Product Description</label>
                <textarea name="product_description" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
            </div>
        </div>
        <!--Main Content-->
        <!-- SIDEBAR-->
        <aside id="admin_sidebar" class="col-md-4">
            <!-- Product Tags -->
            <div class="form-group">
                <label for="short_desc">Product Short Description</label>
                <textarea name="short_desc" class="form-control" rows="5"></textarea>
            </div>
            <hr>
            <!-- Product Categories-->
            <div class="form-group">
                <label for="product_category_id">Product Category</label>
                <select name="product_category_id" id="" class="form-control">
                    <option value="" selected="true" disabled="disabled">Select Category</option>
                    <?php fetch_categories() ?>
                </select>
            </div>
            <!-- Product Brands-->
            <div class="form-group">
                <label for="product_quantity">Product Quantity</label>
                <input type="number" name="product_quantity" class="form-control">
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="product-price">Product Price</label>
                    <input type="number" name="product_price" class="form-control" size="60">
                </div>
                <!-- Product Image -->
                <div class="col-sm-6">
                    <label for="product-image">Product Image</label>
                    <input type="file" name="product_image">
                </div>
            </div>
        </aside>
        <!--SIDEBAR-->
    </form>