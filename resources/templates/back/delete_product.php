<?php
require_once("../../config.php");

if (isset($_GET['id'])) {
    $del = run_query("SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']));
    confirm_query($del);
    while ($row = fetch_array($del)) {
        unlink(UPLOAD_DIRECTORY . DS . $row['product_image']);
    }
    $query = run_query("DELETE FROM products WHERE product_id = " . escape_string($_GET['id']));
    confirm_query($query);
    send_message("Product was deleted");
    redirect("../../../public/admin/index.php?product");
} else {
    redirect("../../../public/admin/index.php?product");
}