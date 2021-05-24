<?php require_once("../resources/config.php"); ?>
<?php include(FRONTEND_TEMPLATE . DS . "header.php") ?>

<!-- Page Content -->
<div class="container">
    <div class="login-form">
        <form method="post">
            <?php user_login() ?>
            <h2 class="text-center">Log in</h2>
            <h6 class="text-center text-danger"><?php show_message(); ?></h6>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" required="required" name="username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required="required" name="password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="submit">Log in</button>
            </div>
            <div class="clearfix">
                <label class="float-left form-check-label"><input type="checkbox" name="remember"> Remember me</label>
            </div>
        </form>
    </div>
</div>

<!-- Footer -->
<?php include(FRONTEND_TEMPLATE . DS . "footer.php") ?>