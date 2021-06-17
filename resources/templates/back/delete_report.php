<?php
require_once("../../config.php");

if (isset($_GET['id'])) {
    $query = run_query("DELETE FROM reports WHERE report_id = " . escape_string($_GET['id']));
    confirm_query($query);
    send_message("Report was deleted");
    redirect("../../../public/admin/index.php?report");
} else {
    redirect("../../../public/admin/index.php?report");
}