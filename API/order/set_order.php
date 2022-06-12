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
$date=date("Y-m-d H:i:s");
$payment_total = $data["payment"];
$result = $result && mysqli_query($db_link, "INSERT INTO `b01`(`B01I01XA`, `B01D02TD`, `B01N03MM`) VALUES ('$uuid','$date','$payment_total')");

// insert into b02
$order_list = $data["order_list"];
foreach($order_list as $order_item){
    $item_uuid = $order_item["uuid"];
    $item_name = $order_item["item_name"];
    $item_price = $order_item["order_price"];
    $item_quantity = $order_item["quantity"];
    $item_remarks = '';
    foreach ($order_item["item_remarks"] as $key => $value) {
        $item_remarks = $item_remarks . $value["remark"];
        if($key !== count($order_item["item_remarks"]) - 1){
            $item_remarks = $item_remarks . ',';
        }
    }
    $result = $result && mysqli_query($db_link, "INSERT INTO `b02`(`B02I01XA`, `B02I02XA`, `B02N03CV0255`, `B02N04MM`, `B02N05CV0255`, `B02N06CV0255`) VALUES ('$item_uuid','$uuid','$item_name','$item_price','$item_remarks', '$item_quantity')");
}

echo $result;