<?php require_once("config.php"); ?>
<?php
if (isset($_GET["add"])) {
    // add is id get from checkout
    $query = run_query("SELECT * FROM products WHERE product_id= " . escape_string($_GET["add"]));
    confirm_query($query);
    while ($row = fetch_array($query)) {
        if ($row['product_quantity'] != $_SESSION['product_' . $_GET["add"]]) {
            $_SESSION['product_' . $_GET["add"]] += 1;
            redirect("../public/checkout.php");
        } else {
            send_message("Sorry, we only have " . $row['product_quantity']
                . " " . $row['product_title'] . " available in stock right now.");
            redirect("../public/checkout.php");
        }
    }
}
if (isset($_GET["remove"])) {
    // remove is id get from checkout
    $_SESSION['product_' . $_GET["remove"]] -= 1;
    if ($_SESSION['product_' . $_GET["remove"]] < 1) {
        unset($_SESSION['price_total']);
        unset($_SESSION['total_quantity']);
        redirect("../public/checkout.php");
    } else {
        redirect("../public/checkout.php");
    }
}
if (isset($_GET["delete"])) {
    $_SESSION['product_' . $_GET["delete"]] = "0";
    unset($_SESSION['price_total']);
    unset($_SESSION['total_quantity']);
    redirect("../public/checkout.php");
}
// Cart item
function cart()
{
    $total = 0;
    $qty = 0;
    foreach ($_SESSION as $name => $value) {
        if ($value > 0) {
            if (substr($name, 0, 8) == "product_") {
                $nameLenght = strlen($name) - 8;
                $productId = substr($name, 8, $nameLenght);
                $query = run_query("SELECT * FROM products WHERE product_id = " . escape_string($productId));
                confirm_query($query);
                while ($row = fetch_array($query)) {
                    $subTotal = $row['product_price'] * $value;
                    $total += $subTotal;
                    $qty += $value;
                    $product = <<<DELIMETER
                    <tr>
                        <td>{$row['product_title']}</td>
                        <td>&#36;{$row['product_price']}</td>
                        <td>{$value}</td>
                        <td>&#36;{$subTotal}</td>
                        <td class="text-center">
                            <a class="btn btn-danger" href="../resources/cart.php?delete={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a>
                            &nbsp;&nbsp;&nbsp;                         
                            <a class="btn btn-warning" href="../resources/cart.php?remove={$row['product_id']}"><span class="glyphicon glyphicon-minus"></span></a>
                            &nbsp;&nbsp;&nbsp;
                            <a class="btn btn-success" href="../resources/cart.php?add={$row['product_id']}"><span class="glyphicon glyphicon-plus"></span></a>
                            &nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                    DELIMETER;
                    echo $product;
                }

                $_SESSION['price_total'] = $total;
                $_SESSION['total_quantity'] = $qty;
            }
        }
    }
}

function show_paypal()
{
    if (isset($_SESSION['total_quantity']) && $_SESSION['total_quantity'] > 0) {
        $paypall = <<<DELIMETER
        <script
            src="https://www.paypal.com/sdk/js?client-id=AfX1HvnlHboY9Rdr-XKoxlxHZBcOqv_7XmoN2ysf3woaDc6rV9pUlDfjZkPXzhqCK8qvlQz2pbJGa2xz&currency=USD&disable-funding=credit,card">
        </script>
        DELIMETER;
        return $paypall;
    }
}


function report()
{
    if (isset($_GET['amt'],  $_GET['cc'], $_GET['tx'], $_GET['st'])) {
        $amountn = $_GET['amt'];
        $currency = $_GET['cc'];
        $transaction = $_GET['tx'];
        $status = $_GET['st'];
        $total = 0;
        $qty = 0;

        if (isset($_SESSION['price_total'])) {
            $order_query = run_query("INSERT INTO orders (order_amount, order_transaction, order_status, order_currency)
             VALUES ('{$amountn}','{$transaction}','{$status}','{$currency}')");
            $last_id = last_id();
            confirm_query($order_query);
        }

        foreach ($_SESSION as $name => $value) {
            if ($value > 0) {
                if (substr($name, 0, 8) == "product_") {
                    $nameLenght = strlen($name) - 8;
                    $productId = substr($name, 8, $nameLenght);

                    $query = run_query("SELECT * FROM products WHERE product_id = " . escape_string($productId));
                    confirm_query($query);

                    while ($row = fetch_array($query)) {
                        $subTotal = $row['product_price'] * $value;
                        $productPrice = $row['product_price'];
                        $productTitle = $row['product_title'];
                        $qty += $value;

                        $query_report = run_query("INSERT INTO reports (product_id, order_id, product_title, product_price, product_quantity)
                         VALUES ('{$productId}','{$last_id}','{$productTitle}','{$productPrice}','{$value}')");
                        confirm_query($query_report);
                    }
                    $total += $subTotal;
                }
            }
        }

        session_destroy();
    } else {
        redirect("index.php");
    }
}
?>