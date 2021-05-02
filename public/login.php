<?php require_once("../resources/config.php"); ?>
<?php include(FRONTEND_TEMPLATE . DS . "header.php") ?>

<!-- Page Content -->
<div class="container">
    <header>
        <h1 class="text-center">Login</h1>
        <h5 class="text-center text-danger"><?php show_message(); ?></h5>
        <div class="col-sm-4 col-sm-offset-5">
            <form class="" action="" method="post" enctype="multipart/form-data">
                <div class="form-group"><label for="">
                        Username<input type="text" name="username" class="form-control" placeholder="Username"></label>
                </div>
                <div class="form-group"><label for="password">
                        Password<input type="password" name="password" class="form-control"
                            placeholder="Password"></label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remeber Me</label>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
        <?php user_login() ?>
    </header>
</div>

<!-- Footer -->
<?php include(FRONTEND_TEMPLATE . DS . "footer.php") ?>