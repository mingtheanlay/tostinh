<?php
require_once("../../config.php");

if (isset($_GET['id'])) {
    $query = run_query("DELETE FROM categories WHERE cat_id = " . escape_string($_GET['id']));
    confirm_query($query);
    send_message("Category was deleted");
    redirect("../../../public/admin/index.php?categories");
} else {
    redirect("../../../public/admin/index.php?categories");
}