<?php
require_once("../../config.php");

if (isset($_GET['id'])) {
    $query = run_query("DELETE FROM users WHERE user_id = " . escape_string($_GET['id']));
    confirm_query($query);
    send_message("User was deleted");
    redirect("../../../public/admin/index.php?user");
} else {
    redirect("../../../public/admin/index.php?user");
}