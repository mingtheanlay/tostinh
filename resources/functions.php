<?php
// General function (Helper)
function run_query($sql)
{
    global $conn;
    return mysqli_query($conn, $sql);
}

function confirm_query($result)
{
    global $conn;
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($conn));
    }
}

function fetch_array($send_query)
{
    return  mysqli_fetch_array($send_query);
}

function escape_string($str)
{
    global $conn;
    return mysqli_real_escape_string($conn, $str);
}

function send_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}

function show_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function redirect($location)
{
    header("Location: $location");
}

// For Front-End
// Get product
function get_products()
{
    $query = run_query("SELECT * from products");
    confirm_query($query);
    while ($row = fetch_array($query)) {
        $product = <<<DELIMETER
        <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <a target="_blank"
                href="item.php?id={$row['product_id']}">
                <img src="{$row['product_image']}"  alt="">
            </a>
            <div class="caption"> 
                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                <h4><a target="_blank" href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
                <p>{$row['product_short_description']}</p>
                <a class="btn btn-primary" target="_blank"
                    href="cart.php?add={$row['product_id']}">Add to cart
                </a>
            </div>
        </div>
        </div>
        DELIMETER;
        echo $product;
    }
}
// Get categories
function get_categories()
{
    $query = "SELECT * FROM categories";
    $send_query = run_query($query);
    confirm_query($send_query);
    while ($row = fetch_array($send_query)) {
        $category = <<<DELIMETER
        <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>
        DELIMETER;
        echo $category;
    }
}
// Show Product
function show_individuel_product($id)
{
    $query = run_query(" SELECT * from products WHERE product_id = " . escape_string($id) . " ");
    confirm_query($query);
    $row = fetch_array($query);
    $block = <<<DELIMETER
    <div class="col-md-9">
        <!--Row For Image and Short Description-->
        <div class="row">
            <div class="col-md-7">
                <img class="img-responsive" src="{$row['product_image']}" alt="">
            </div>
            <div class="col-md-5">
                <div class="thumbnail">
                    <div class="caption-full">
                        <h4><a href="#">{$row['product_title']}</a> </h4>
                        <hr>
                        <h4 class="">&#36;{$row['product_price']}</h4>
                        <p>{$row['product_short_description']}</p>
                        <form action="">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Add to Cart">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Row For Image and Short Description-->
        <hr>
        <!--Row for Tab Panel-->
        <div class="row">
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                            data-toggle="tab">Description</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <p>{$row['product_description']}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    DELIMETER;
    echo $block;
}
// Get product in category page
function get_product_in_cat_page($id)
{
    $query = run_query(" SELECT * FROM products WHERE product_category_id = " . escape_string($id) . " ");
    confirm_query($query);
    while ($row = fetch_array($query)) {
        $block = <<<DELIMETER
        <!-- Page Features -->
        <!-- Page Features -->
        <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <a target="_blank"
                href="item.php?id={$row['product_id']}">
                <img src="{$row['product_image']}"  alt="">
            </a>
            <div class="caption"> 
                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                <h4><a target="_blank" href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
                <p>{$row['product_short_description']}</p>
                <a class="btn btn-primary" target="_blank"
                    href="checkout.php?id={$row['product_id']}">Buy Now
                </a>
                <a  href="item.php?id={$row['product_id']}" class="btn btn-default">MoreInfo</a>
            </div>
        </div>
        </div>
        DELIMETER;
        echo $block;
    }
}
// Get product in shop page
function get_product_in_shop_page()
{
    $query = run_query(" SELECT * FROM products ");
    confirm_query($query);
    while ($row = fetch_array($query)) {
        $block = <<<DELIMETER
        <!-- Page Features -->
        <!-- Page Features -->
        <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <a target="_blank"
                href="item.php?id={$row['product_id']}">
                <img src="{$row['product_image']}"  alt="">
            </a>
            <div class="caption"> 
                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                <h4><a target="_blank" href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
                <p>{$row['product_short_description']}</p>
                <a class="btn btn-primary" target="_blank"
                    href="checkout.php?id={$row['product_id']}">Buy Now
                </a>
                <a  href="item.php?id={$row['product_id']}" class="btn btn-default">MoreInfo</a>
            </div>
        </div>
        </div>
        DELIMETER;
        echo $block;
    }
}
// Login user
function user_login()
{
    if (isset($_POST["submit"])) {
        $username = escape_string($_POST["username"]);
        $password = escape_string($_POST["password"]);
        $query = run_query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");
        confirm_query($query);
        if (mysqli_num_rows($query) == 0) {
            send_message("Incorrect Username or Password");
            redirect("login.php");
        } else {
            redirect("admin");
        }
    }
}
// Get total price in session 
function get_total_price()
{
    if (isset($_SESSION['price_total'])) {
        echo "&#36;" . $_SESSION['price_total'];
    } else {
        $_SESSION['price_total'] = "";
        echo $_SESSION['price_total'] = "&#36;" . "0";
    }
}
// Get total price in session 
function get_total_quantity()
{
    if (isset($_SESSION['total_quantity'])) {
        echo $_SESSION['total_quantity'];
    } else {
        $_SESSION['total_quantity'] = "";
        echo $_SESSION['total_quantity'] = "0";
    }
}

// For Back-End