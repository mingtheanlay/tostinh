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
    $item_name = 0;
    $item_number = 1;
    $amount = 1;
    $item_qty = 1;
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
                    <input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
                    <input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
                    <input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
                    <input type="hidden" name="quantity_{$item_qty}" value="{$row['product_quantity']}">
                    DELIMETER;

                    echo $product;

                    $item_name++;
                    $item_number++;
                    $amount++;
                    $item_qty++;

                    $_SESSION['price_total'] = $total;
                    $_SESSION['total_quantity'] = $qty;
                }
            }
        }
    }
}


?>