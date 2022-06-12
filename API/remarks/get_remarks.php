<?php

/**
 * Get the remarks and send it in a JSON format
 */
require_once("../db_config.php");

$remarks_query = mysqli_query($db_link, "SELECT * FROM `a03`");
$remarks = [];
while ($row = mysqli_fetch_row($remarks_query)) {
    $remarks[] = array("uuid" => $row[0], "remark" => $row[1]);
}

echo json_encode($remarks);
