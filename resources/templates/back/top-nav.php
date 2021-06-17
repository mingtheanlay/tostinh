<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/tostinh/public/admin/">
        <img src="img/bg-logo.png" width="30" height="30" alt="" style="display: inline-block;">
        Tos Tinh Administrator</a>
</div>
<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
            <?php
            echo get_admin_username();
            ?>
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li class="divider"></li>
            <li>
                <a href="../index.php"><i class="fa fa-refresh" aria-hidden="true"></i>
                    Main Site
                </a>
            </li>
            <li>
                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i>
                    Log Out
                </a>
            </li>
        </ul>
    </li>
</ul>