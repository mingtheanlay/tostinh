<?php
require_once("../../config.php");

if (isset($_GET['id'])) {
    $query = run_query("DELETE FROM products WHERE product_id = " . escape_string($_GET['id']));
    confirm_query($query);
    send_message("Product Deleted");
    redirect("../../../public/admin/index.php?product");
} else {
    redirect("../../../public/admin/index.php?product");
}