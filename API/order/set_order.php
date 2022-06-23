<?php
/**
 * Get the current order log 
 */
require_once("../db_config.php");
$result = true;
$data = json_decode(file_get_contents('php://input'), true);

// insert into b01
$uuid = $data["uuid"];
date_default_timezone_get();
$date = date("Y-m-d H:i:s");
$payment_total = $data["payment"];
$table_uuid = $data["table_uuid"];

// find if b01 has any available records to place under, otherwise use a new UUID
$is_table_in_use_query = mysqli_query($db_link, "SELECT * FROM `b01` WHERE `B01I04XA` = '$table_uuid' AND `B01N05IT` = '0'");
if (mysqli_num_rows($is_table_in_use_query) === 0) {
    // no available records to put under, therefore insert a new record
    $result = $result && mysqli_query($db_link, "INSERT INTO `b01`(`B01I01XA`, `B01D02TD`, `B01N03MM`, `B01I04XA`) VALUES ('$uuid','$date','$payment_total', '$table_uuid')");
} else {
    // turn the found row into an array
    $table_in_use = mysqli_fetch_row($is_table_in_use_query);

    // there is availble record, then update the total amount `B01N03MM`
    $previous_amount = (int) $table_in_use[2];
    $current_amount = $previous_amount + $payment_total;
    $result = $result && mysqli_query($db_link, "UPDATE `b01` SET `B01N03MM`='$current_amount' WHERE `B01I04XA` = '$table_uuid' AND `B01N05IT` = '0'");

    // set the uuid of b01 to be placed in b02
    $uuid = $table_in_use[0];
}

// insert into b02 and print
$order_list = $data["order_list"];
foreach ($order_list as $order_item) {
    $item_uuid = $order_item["uuid"];
    $item_name = $order_item["item_name"];
    $item_price = $order_item["order_price"];
    $item_quantity = $order_item["quantity"];
    $item_remarks = '';
    foreach ($order_item["item_remarks"] as $key => $value) {
        $item_remarks = $item_remarks . $value["remark"];
        if ($key !== count($order_item["item_remarks"]) - 1) {
            $item_remarks = $item_remarks . ',';
        }
    }

    $result = $result && mysqli_query($db_link, "INSERT INTO `b02`(`B02I01XA`, `B02I02XA`, `B02N03CV0255`, `B02N04MM`, `B02N05CV0255`, `B02N06CV0255`) VALUES ('$item_uuid','$uuid','$item_name','$item_price','$item_remarks', '$item_quantity')");
}

echo $result;
