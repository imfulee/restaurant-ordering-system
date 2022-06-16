<?php 
require_once("../db_config.php");
$result = true;
// get the table uuid in JSON form
$data = json_decode(file_get_contents('php://input'), true);
$table_uuid = $data["table_uuid"];
$checkout_item_query = mysqli_query($db_link, "SELECT `B02I01XA`, `B02N03CV0255`, `B02N04MM`, `B02N05CV0255`, `B02N06CV0255`, `B01I01XA`, `B01N03MM` FROM `b02` LEFT JOIN `b01` ON `B02I02XA` = `B01I01XA` WHERE `B01I04XA` = '$table_uuid' AND `B01N04IT` = '0'");
$checkout_item_query_row = [];
$total_charge = 0;
$b01_uuid = '';
while($row = mysqli_fetch_row($checkout_item_query)){
    $b01_uuid = $row[5];
    $total_charge = $row[6];
    $checkout_item_query_row[] = array(
        "item_uuid" => $row[0],
        "item_name" => $row[1],
        "item_price" => $row[2],
        "item_remark" => $row[3],
        "item_quantity" => $row[4]
    );
}

echo json_encode(array(
    "b01_uuid" => $b01_uuid,
    "total_charge" => $total_charge,
    "checkout_items" => $checkout_item_query_row
));
