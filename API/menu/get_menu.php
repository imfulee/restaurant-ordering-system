<?php

/**
 * Get the menu and send it in a JSON format
 */
require_once("../db_config.php");

$menu_table = array();
$menu_query = mysqli_query($db_link, "SELECT `a02`.`A02I01XA`, `a04`.`A04N02CV0255`, `a02`.`A02N03CV0255`, `a02`.`A02N04MM`, `a02`.`A02I02XA` FROM `a02` LEFT JOIN a04 ON A04I01XA = A02I02XA");
while ($row = mysqli_fetch_row($menu_query)) {
    $menu_table[] = array(
        "uuid" => $row[0],
        "type" => $row[1],
        "item_name" => $row[2],
        "price" => $row[3],
        "type_uuid" => $row[4],
    );
}

echo json_encode($menu_table);
