<div class="col-lg-12">
    <h1 class="page-header">
        Users
        <a href="index.php?add_user" class="btn btn-primary" style="float: right;">Add User</a>
    </h1>
    <h4 class="text-success">
        <?php show_message(); ?>
    </h4>
    <div class="col-md-12">
        <table class="table table-hover">
            <thead style="background-color: gray; color: white; ">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php show_user() ?>
            </tbody>
        </table>
        <!--End of Table-->
    </div>
</div>