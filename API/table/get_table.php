<?php 
/**
 * Get the current table count
 */
require_once("../db_config.php");
$table_names = [];

$table_names_query = mysqli_query($db_link, "SELECT * FROM A01");
while ($row = mysqli_fetch_row($table_names_query)) {
    $table_names[] = array("uuid" => $row[0], "table_name" => $row[1]);
}

echo json_encode($table_names);