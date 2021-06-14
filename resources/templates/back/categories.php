<h1 class="page-header">
    Product Categories
</h1>
<?php add_category() ?>
<h4 class="text-success">
    <?php show_message(); ?>
</h4>
<div class="col-md-4">
    <form action="" method="post">
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" class="form-control" name="cat_title">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Add Category" name="add_category">
        </div>
    </form>
</div>
<div class="col-md-8">
    <table class="table">
        <thead style="background-color: gray; color: white; ">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            show_categories();
            ?>
        </tbody>
    </table>
</div>