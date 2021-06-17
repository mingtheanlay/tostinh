<h1 class="header">Slide Show</h1>
<hr>
<div class="row">
    <div class="col-xs-6 col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-3">
                <h4 class="text-success">
                    <?php show_message(); ?>
                </h4>
                <?php
                add_slide();
                ?>
                <label for="title">Slide Title</label>
                <input type="text" name="banner_title" class="form-control">
                <br>
                <input type="file" name="thumnail">
                <br>
                <div class="form-group">
                    <input type="submit" name="add_banner" class="btn btn-primary btn-md" value="Add Banner">
                </div>
            </div>
            <div class="form-group col-md-9">
                <?php current_active_slide_admin() ?>
            </div>
        </form>
    </div>
</div>

<h1 class="header">All Slide Show</h1>
<hr>
<div class="row">
    <div class="col-xs-6 col-md-12">
        <table class="table table-hover">
            <thead style="background-color: gray; color: white; ">
                <tr>
                    <th>Slide ID</th>
                    <th>Slide Title</th>
                    <th>Preview</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php get_slide_thumnail(); ?>
            </tbody>
        </table>
    </div>
</div>