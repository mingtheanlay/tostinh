<?php require_once("../resources/config.php"); ?>
<?php
if (isset($_GET["add"])) {
    // add is id get from checkout
    $query = run_query("SELECT * FROM products WHERE product_id= " . escape_string($_GET["add"]));
    confirm_query($query);
    while ($row = fetch_array($query)) {
        if ($row['product_quantity'] != $_SESSION['product_' . $_GET["add"]]) {
            $_SESSION['product_' . $_GET["add"]] += 1;
            redirect("checkout.php");
        } else {
            send_message("Sorry, we only have " . $row['product_quantity']
                . " " . $row['product_title'] . " available in stock right now.");
            redirect("checkout.php");
        }
    }
}
if (isset($_GET["remove"])) {
    // remove is id get from checkout
    $_SESSION['product_' . $_GET["remove"]] -= 1;
    if ($_SESSION['product_' . $_GET["remove"]] < 1) {
        unset($_SESSION['price_total']);
        unset($_SESSION['total_quantity']);
        redirect("checkout.php");
    } else {
        redirect("checkout.php");
    }
}
if (isset($_GET["delete"])) {
    $_SESSION['product_' . $_GET["delete"]] = "0";
    unset($_SESSION['price_total']);
    unset($_SESSION['total_quantity']);
    redirect("checkout.php");
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
                            <a class="btn btn-success" href="cart.php?add={$row['product_id']}"><span class="glyphicon glyphicon-plus"></span></a>
                            &nbsp;&nbsp;&nbsp;
                            <a class="btn btn-warning" href="cart.php?remove={$row['product_id']}"><span class="glyphicon glyphicon-minus"></span></a>
                            &nbsp;&nbsp;&nbsp;
                            <a class="btn btn-danger" href="cart.php?delete={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a>
                            &nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                    DELIMETER;
                    echo $product;
                    $_SESSION['price_total'] = $total;
                    $_SESSION['total_quantity'] = $qty;
                }
            }
        }
    }
}


?>