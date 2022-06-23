<?php

require_once("../db_config.php");
$types = [];

$types_query = mysqli_query($db_link, "SELECT * FROM `a04` ORDER BY `a04`.`A04D03TD` ASC");
while ($row = mysqli_fetch_row($types_query)) {
    $types[] = array("uuid" => $row[0], "type" => $row[1]);
}

echo json_encode($types);