<?php 

require_once("../db_config.php");
$result = true;
$data = json_decode(file_get_contents('php://input'), true);

// delete the selected order item
$item_uuid = $data["item_uuid"];
$result = $result && mysqli_query($db_link, "DELETE FROM `b02` WHERE `B02I01XA` = '$item_uuid'");

// get the current payment due
$table_uuid = $data["table_uuid"];
$payment_query = mysqli_query($db_link, "SELECT `B01N03MM` FROM `b01` WHERE `B01I04XA` = '$table_uuid' AND `B01N05IT` = '0'");
$payment_cur  = (int) mysqli_fetch_row($payment_query)[0];
$payment_item = (int) $data["item_price"];
$payment_final = $payment_cur - $payment_item;

// update the total payment due
$result = $result && mysqli_query($db_link, "UPDATE `b01` SET `B01N03MM`='$payment_final' WHERE `B01I04XA` = '$table_uuid' AND `B01N05IT` = '0'");

echo json_encode($result);