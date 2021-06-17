<?php
require_once("../../config.php");
if (isset($_GET["id"])) {
    $del = run_query("SELECT * FROM slides WHERE slide_id = " . escape_string($_GET['id']));
    confirm_query($del);
    while ($row = fetch_array($del)) {
        unlink(UPLOAD_DIRECTORY . DS . $row['slide_image']);
    }
    $query = run_query("DELETE FROM slides WHERE slide_id = " . escape_string($_GET['id']));
    confirm_query($query);
    send_message("Thumnail was deleted");
    redirect("../../../public/admin/index.php?slides");
} else {
    redirect("../../../public/admin/index.php?slides");
}