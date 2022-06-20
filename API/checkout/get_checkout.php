<?php
// return all the tables that are not paid
require_once("../db_config.php");
$result = true;
// get the table uuid
$checkout_return = [];
$all_table_uuid_arr = [];
$all_table_uuid_query = mysqli_query($db_link, "SELECT * FROM `a01`");
while ($table_row = mysqli_fetch_row($all_table_uuid_query)) {
    $table_uuid = $table_row[0];
    $checkout_item_query = mysqli_query($db_link, "SELECT `B02I01XA`, `B02N03CV0255`, `B02N04MM`, `B02N05CV0255`, `B02N06CV0255`, `B01I01XA`, `B01N03MM` FROM `b02` LEFT JOIN `b01` ON `B02I02XA` = `B01I01XA` WHERE `B01I04XA` = '$table_uuid' AND `B01N05IT` = '0'");
    $checkout_item_query_row = [];
    $total_charge = 0;
    $b01_uuid = '';
    while ($checkout_row = mysqli_fetch_row($checkout_item_query)) {
        $b01_uuid = $checkout_row[5];
        $total_charge = $checkout_row[6];
        $checkout_item_query_row[] = array(
            "item_uuid" => $checkout_row[0],
            "item_name" => $checkout_row[1],
            "item_price" => $checkout_row[2],
            "item_remark" => $checkout_row[3],
            "item_quantity" => $checkout_row[4]
        );
    }
    if (count($checkout_item_query_row) !== 0) {
        $checkout_return[] = array(
            "b01_uuid" => $b01_uuid,
            "table_name" => $table_row[1],
            "total_charge" => $total_charge,
            "checkout_items" => $checkout_item_query_row
        );
    }
}

echo json_encode($checkout_return);
