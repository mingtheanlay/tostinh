<?php
$upload_dir = "uploads";

function last_id()
{
    global $conn;
    return mysqli_insert_id($conn);
}


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

function get_admin_username()
{
    return $_SESSION['username'];
}

// For Front-End
// Get product
function get_products()
{
    $query = run_query("SELECT * from products");
    confirm_query($query);

    $rows = mysqli_num_rows($query);

    if (isset($_GET["page"])) {
        $page = preg_replace('#[^0-9]#', '', $_GET["page"]);
    } else {
        $page = 1;
    }

    $per_page = 6;
    $last_page = ceil($rows / $per_page);

    if ($page < 1) {
        $page = 1;
    } else if ($page > $last_page) {
        $page = $last_page;
    }

    $middle_number = '';
    $sub1 = $page - 1;
    $sub2 = $page - 2;
    $add1 = $page + 1;
    $add2 = $page + 2;

    if ($page == 1) {
        $middle_number .= '<li class="page-item active"><a>' . $page . '</a></li>';
        $middle_number .= '<li class="page-item">
            <a class="page-link" href="' . $_SERVER['PHP_SELF'] .
            '?page=' . $add1 . '">' . $add1 . '</a></li>';
    } else if ($page == $last_page) {
        $middle_number .= '<li class="page-item">
            <a class="page-link" href="' . $_SERVER['PHP_SELF'] .
            '?page=' . $sub1 . '">' . $sub1 . '</a></li>';
        $middle_number .= '<li class="page-item active"><a>' . $page . '</a></li>';
    } else if ($page > 2 && $page < ($last_page - 1)) {
        $middle_number .= '<li class="page-item">
            <a class="page-link" href="' . $_SERVER['PHP_SELF'] .
            '?page=' . $sub2 . '">' . $sub2 . '</a></li>';
        $middle_number .= '<li class="page-item">
            <a class="page-link" href="' . $_SERVER['PHP_SELF'] .
            '?page=' . $sub1 . '">' . $sub1 . '</a></li>';
        $middle_number .= '<li class="page-item active"><a>' . $page . '</a></li>';
        $middle_number .= '<li class="page-item">
            <a class="page-link" href="' . $_SERVER['PHP_SELF'] .
            '?page=' . $add1 . '">' . $add1 . '</a></li>';
        $middle_number .= '<li class="page-item">
            <a class="page-link" href="' . $_SERVER['PHP_SELF'] .
            '?page=' . $add2 . '">' . $add2 . '</a></li>';
    } else if ($page > 1 && $page < $last_page) {
        $middle_number .= '<li class="page-item">
            <a class="page-link" href="' . $_SERVER['PHP_SELF'] .
            '?page=' . $sub1 . '">' . $sub1 . '</a></li>';
        $middle_number .= '<li class="page-item active"><a>' . $page . '</a></li>';
        $middle_number .= '<li class="page-item">
            <a class="page-link" href="' . $_SERVER['PHP_SELF'] .
            '?page=' . $add1 . '">' . $add1 . '</a></li>';
    }

    $limit = 'LIMIT ' . ($page - 1) * $per_page . ',' . $per_page;

    $query2 = run_query("SELECT * from products " . $limit);
    confirm_query($query2);

    $output_pagination = "";
    if ($page != 1) {
        $prev = $page - 1;
        $output_pagination .= '<li class="page-item">
        <a class="page-link" href="' . $_SERVER['PHP_SELF'] .
            '?page=' . $prev . '">' . "Back" . '</a></li>';
    }
    $output_pagination .= $middle_number;
    if ($page != $last_page) {
        $next = $page + 1;
        $output_pagination .= '<li class="page-item">
        <a class="page-link" href="' . $_SERVER['PHP_SELF'] .
            '?page=' . $next . '">' . "Next" . '</a></li>';
    }

    while ($row = fetch_array($query2)) {
        $img = display_image($row['product_image']);
        $product = <<<DELIMETER
        <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <a target="_blank"
                href="item.php?id={$row['product_id']}">
                <img src="../resources/{$img}"  alt="" style="height: 150px;">
            </a>
            <div class="caption"> 
                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                <h4><a target="_blank" href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
                <p>{$row['product_short_description']}</p>
                <a class="btn btn-primary" target="_blank"
                    href="../resources/cart.php?add={$row['product_id']}">Add to cart
                </a>
            </div>
        </div>
        </div>
        DELIMETER;
        echo $product;
    }
    echo "
    <div style='clear: both' class='text-center'>
        <ul class='pagination'>{$output_pagination}</ul>
    </div>";
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

function get_categories_title()
{
    if (isset($_GET["id"])) {
        $query = "SELECT * FROM categories WHERE cat_id = " . escape_string($_GET["id"]);
        $send_query = run_query($query);
        confirm_query($send_query);
        while ($row = fetch_array($send_query)) {
            $category_title = <<<DELIMETER
            <h1>{$row['cat_title']}</h1>
            DELIMETER;
        }
        echo $category_title;
    }
}
// Show Product
function show_individuel_product($id)
{
    $query = run_query(" SELECT * from products WHERE product_id = " . escape_string($id) . " ");
    confirm_query($query);
    $row = fetch_array($query);
    $img = display_image($row['product_image']);
    $block = <<<DELIMETER
    <div class="col-md-9">
        <!--Row For Image and Short Description-->
        <div class="row">
            <div class="col-md-7">
                <img class="img-responsive" src="../resources/{$img}" alt="">
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
                                <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now</a>
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
        $img = display_image($row['product_image']);
        $block = <<<DELIMETER
        <!-- Page Features -->
        <!-- Page Features -->
        <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <a target="_blank"
                href="item.php?id={$row['product_id']}">
                <img src="../resources/{$img}" style="height: 150px;"  alt="">
            </a>
            <div class="caption"> 
                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                <h4><a target="_blank" href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
                <p>{$row['product_short_description']}</p>
                <a class="btn btn-primary" target="_blank"
                    href="../resources/cart.php?add={$row['product_id']}">Buy Now
                </a>
                <a  href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
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
    $query = run_query(" SELECT * FROM products");
    confirm_query($query);
    while ($row = fetch_array($query)) {
        $img = display_image($row['product_image']);
        $block = <<<DELIMETER
        <!-- Page Features -->
        <!-- Page Features -->
        <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <a target="_blank"
                href="item.php?id={$row['product_id']}">
                <img src="../resources/{$img}"  alt="" style="height: 150px;">
            </a>
            <div class="caption"> 
                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                <h4><a target="_blank" href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
                <p>{$row['product_short_description']}</p>
                <a class="btn btn-primary" target="_blank"
                    href="../resources/cart.php?add={$row['product_id']}">Buy Now
                </a>
                <a  href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
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
            if (isset($_POST["remember"])) {
                setcookie("login", $username, time() + (10 * 364 * 24 * 60 * 60),  "/");
                $_SESSION['username'] = $username;
                redirect("admin");
            } else {
                setcookie("login", $username, time() + (3600 * 1),  "/");
                $_SESSION['username'] = $username;
                redirect("admin");
            }
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
function display_orders()
{
    $query = run_query("SELECT * FROM orders");
    confirm_query($query);
    while ($row = fetch_array($query)) {
        $order = <<<DELIMETER
        <tr>
            <td>{$row['order_id']}</td>
            <td>{$row['order_amount']}</td>
            <td>{$row['order_transaction']}</td>
            <td>{$row['order_currency']}</td>
            <td>{$row['order_status']}</td>
            <td>
                <a class="btn btn-danger" href="../../resources/templates/back/delete_order.php?id={$row['order_id']}">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            </td>
        </tr>
        DELIMETER;
        echo $order;
    }
}

// Admin Product
function get_product_admin()
{
    $query = run_query("SELECT * from products");
    confirm_query($query);
    while ($row = fetch_array($query)) {
        $category = fetch_categories_for_product($row['product_category_id']);
        $img = display_image($row['product_image']);
        $product = <<<DELIMETER
        <tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']}</td>
            <td><img src="../../resources/{$img}" width='100' width='50'></td>
            <td>{$category}</td>
            <td>&#36;{$row['product_price']}</td>
            <td>{$row['product_quantity']}</td>
            <td>
            <a class="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['product_id']}">
                <span class="glyphicon glyphicon-remove"></span>
            </a>
            <a class="btn btn-info" href="index.php?edit_product&id={$row['product_id']}">
                <span class="glyphicon glyphicon-edit"></span>
            </a>
            </td>
        </tr>
        DELIMETER;
        echo $product;
    }
}

function add_product()
{
    if (isset($_POST['publish'])) {
        $product_title = escape_string($_POST['product_title']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_price = escape_string($_POST['product_price']);
        $product_description = escape_string($_POST['product_description']);
        $short_desc = escape_string($_POST['short_desc']);
        $product_quantity = escape_string($_POST['product_quantity']);

        // Getting file name
        $filename = escape_string($_FILES['product_image']['name']);

        // Valid extension
        $valid_ext = array('png', 'jpeg', 'jpg');

        // Location
        $location = UPLOAD_DIRECTORY . DS . $filename;
        $image_tmp_location = escape_string($_FILES['product_image']['tmp_name']);

        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);

        // Check extension
        if (in_array($file_extension, $valid_ext)) {
            // Compress Image
            compressImage($image_tmp_location, $location, 60);

            $query = run_query("INSERT INTO products(product_title
            , product_category_id, product_price, product_quantity 
            , product_description, product_image, product_short_description) 
            VALUES ('{$product_title}', '{$product_category_id}', '{$product_price}'
            , '{$product_quantity}', '{$product_description}', '{$filename}', '{$short_desc}')");
            $last_id = last_id();
            confirm_query($query);
            send_message("$product_title was added to database");
            redirect("index.php?product");
        } else {
            echo "Invalid file type.";
        }
    }
}

function fetch_categories()
{
    $query = "SELECT * FROM categories";
    $send_query = run_query($query);
    confirm_query($send_query);
    while ($row = fetch_array($send_query)) {
        $category = <<<DELIMETER
        <option value="{$row['cat_id']}">{$row['cat_title']}</option>
        DELIMETER;
        echo $category;
    }
}

function compressImage($source, $destination, $quality)
{
    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);
}

function fetch_categories_for_product($cat_id)
{
    $query = "SELECT * FROM categories WHERE cat_id = " . escape_string($cat_id);
    $send_query = run_query($query);
    confirm_query($send_query);
    $row = fetch_array($send_query);
    $category = $row['cat_title'];
    return ($category);
}

function display_image($picture)
{
    global $upload_dir;
    return $upload_dir . DS . $picture;
}

function update_product()
{
    if (isset($_POST['update'])) {
        $product_title = escape_string($_POST['product_title']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_price = escape_string($_POST['product_price']);
        $product_description = escape_string($_POST['product_description']);
        $short_desc = escape_string($_POST['short_desc']);
        $product_quantity = escape_string($_POST['product_quantity']);

        // Getting file name
        $filename = escape_string($_FILES['product_image']['name']);

        // Valid extension
        $valid_ext = array('png', 'jpeg', 'jpg');

        // Location
        $location = UPLOAD_DIRECTORY . DS . $filename;
        $image_tmp_location = escape_string($_FILES['product_image']['tmp_name']);

        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);

        if (empty($filename)) {
            $thumnail_dir = run_query("SELECT product_image FROM products WHERE product_id = " . escape_string($_GET["id"]));
            confirm_query($thumnail_dir);
            while ($row = fetch_array($thumnail_dir)) {
                $filename = $row['product_image'];
            }
        } else {
            // Check extension
            if (in_array($file_extension, $valid_ext)) {
                // Compress Image
                compressImage($image_tmp_location, $location, 60);

                $del = run_query("SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']));
                confirm_query($del);
                while ($row = fetch_array($del)) {
                    unlink(UPLOAD_DIRECTORY . DS . $row['product_image']);
                }
            } else {
                echo "Invalid file type.";
            }
        }

        $query = "UPDATE products SET ";
        $query .= "product_title = '{$product_title}', ";
        $query .= "product_category_id = '{$product_category_id}', ";
        $query .= "product_price = '{$product_price}', ";
        $query .= "product_description = '{$product_description}', ";
        $query .= "product_short_description  = '{$short_desc}', ";
        $query .= "product_quantity = '{$product_quantity}', ";
        $query .= "product_image = '{$filename}'";
        $query .= " WHERE product_id = " . escape_string($_GET['id']);

        $send_query = run_query($query);
        confirm_query($send_query);
        send_message("$product_title has been updated");
        redirect("index.php?product");
    }
}

function show_categories()
{
    $get_cat =  run_query("SELECT * FROM categories");
    confirm_query($get_cat);
    while ($row = fetch_array($get_cat)) {
        $categories = <<<DELIMETER
        <tr>
            <td>{$row['cat_id']}</td>
            <td>{$row['cat_title']}</td>
            <td>
                <a class="btn btn-danger" href="../../resources/templates/back/delete_category.php?id={$row['cat_id']}">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            </td>
        </tr>
        DELIMETER;
        echo $categories;
    }
}

function add_category()
{
    if (isset($_POST['add_category'])) {
        $cat_title = escape_string($_POST['cat_title']);
        if (empty($cat_title) || $cat_title == " ") {
            $text = <<<DELIMETER
            <h4 class="text-danger">
                Category Title cannot be empty
            </h4>
            DELIMETER;
            echo $text;
        } else {
            $add_cat = run_query("INSERT INTO categories (cat_title) VALUES ('{$cat_title}')");
            confirm_query($add_cat);
            send_message("$cat_title was added to categories table");
        }
    }
}

function show_user()
{
    $get_user =  run_query("SELECT * FROM users");
    confirm_query($get_user);
    while ($row = fetch_array($get_user)) {
        $users = <<<DELIMETER
        <tr>
            <td>{$row['user_id']}</td>
            <td>{$row['username']}</td>
            <td>{$row['email']}</td>
            <td>
            <a class="btn btn-danger"
                href="../../resources/templates/back/delete_user.php?id={$row['user_id']}">
                <span class="glyphicon glyphicon-remove"></span>
            </a>
            </td>
        </tr>
        DELIMETER;
        echo $users;
    }
}

function add_user()
{
    if (isset($_POST['add_user'])) {
        $username = escape_string($_POST['username']);
        $email = escape_string($_POST['email']);
        $password = escape_string($_POST['password']);
        $query = run_query("INSERT INTO users(username, email, password) 
        VALUES ('{$username}', '{$email}', '{$password}')");
        confirm_query($query);
        send_message("$username was added");
        redirect("index.php?user");
    }
}

function report()
{
    $get_report =  run_query("SELECT * FROM reports");
    confirm_query($get_report);
    while ($row = fetch_array($get_report)) {
        $categories = <<<DELIMETER
        <tr>
            <td>{$row['report_id']}</td>
            <td>{$row['product_id']}</td>
            <td>{$row['order_id']}</td>
            <td>{$row['product_title']}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_quantity']}</td>
            <td>         
            <a class="btn btn-danger" href="../../resources/templates/back/delete_report.php?id={$row['report_id']}">
            <span class="glyphicon glyphicon-remove"></span>
        </a></td>
        </tr>
        DELIMETER;
        echo $categories;
    }
}

function get_slide()
{
    $query = run_query("SELECT * FROM slides");
    confirm_query($query);
    while ($row = fetch_array($query)) {
        $slide = <<<DELIMETER
        <div class="item">
            <img class="slide-image" src="../resources/uploads/{$row['slide_image']}" alt="{$row['slide_title']}">
        </div>
        DELIMETER;
        echo $slide;
    }
}

function active_slide()
{
    $query = run_query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
    confirm_query($query);
    while ($row = fetch_array($query)) {
        $slide_active = <<<DELIMETER
        <div class="item active">
            <img class="slide-image" src="../resources/uploads/{$row['slide_image']}" alt="{$row['slide_title']}">
        </div>
        DELIMETER;
        echo $slide_active;
    }
}

function current_active_slide_admin()
{
    $query = run_query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1 ");
    confirm_query($query);
    while ($row = fetch_array($query)) {
        $current_active_slide_admin = <<<DELIMETER
            <img class="img-responsive" src="../../resources/uploads/{$row['slide_image']}" alt="{$row['slide_title']}">
        DELIMETER;
        echo $current_active_slide_admin;
    }
}

function add_slide()
{
    if (isset($_POST['add_banner'])) {
        $slide_title = escape_string($_POST["banner_title"]);

        // Getting file name
        $slide_image = escape_string($_FILES['thumnail']['name']);

        // Valid extension
        $valid_ext = array('png', 'jpeg', 'jpg');

        // Location
        $location = UPLOAD_DIRECTORY . DS . $slide_image;
        $image_tmp_location = escape_string($_FILES['thumnail']['tmp_name']);

        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);

        // Check extension
        if (in_array($file_extension, $valid_ext) && !empty($slide_title) &&  !empty($slide_image)) {
            // Compress Image
            compressImage($image_tmp_location, $location, 60);
            $query = run_query("INSERT INTO slides (slide_title, slide_image) VALUES ('{$slide_title}', '{$slide_image}')");
            confirm_query($query);
            send_message("Slide was added");
            redirect("index.php?slides");
        } else {
            echo "<p class='text-danger'>Missing fields</p>";
        }
    }
}

function get_slide_thumnail()
{
    $query = run_query("SELECT * FROM slides ORDER BY slide_id ASC");
    confirm_query($query);
    while ($row = fetch_array($query)) {
        $img = display_image($row['slide_image']);
        $get_slide_thumnail = <<<DELIMETER
        <tr>
            <td>{$row['slide_id']}</td>
            <td>{$row['slide_title']}</td>
            <td><img src="../../resources/{$img}" width='100' width='50'></td>
            <td> 
            <a class="btn btn-danger" href="../../resources/templates/back/delete_slide.php?id={$row['slide_id']}">
            <span class="glyphicon glyphicon-remove"></span>
            </td>
        </a></td>
        </tr>
        DELIMETER;
        echo $get_slide_thumnail;
    }
}