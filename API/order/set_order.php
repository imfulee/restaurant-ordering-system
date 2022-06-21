<?php
require_once('../../vendor/autoload.php');

use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;

// initialize printer with font size options
$connector = new NetworkPrintConnector("192.168.11.100", 9100);
$printer = new Printer($connector);
$printer->setTextSize(2,2);
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
// print table name
$table_name = '';
$table_name_query = mysqli_query($db_link, "SELECT `A01N02CV0255` FROM `a01` WHERE `A01I01XA` = '$table_uuid'");
$table_name_result = mysqli_fetch_row($table_name_query)[0];
$printer->textChinese("桌號$table_name_result\n");
$printer->feed(2);


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
    $item_remarks = $item_remarks_chi = '';
    foreach ($order_item["item_remarks"] as $key => $value) {
        $item_remarks = $item_remarks . $value["remark"];
        $item_remarks_chi = $item_remarks_chi . $value["remark"];
        if ($key !== count($order_item["item_remarks"]) - 1) {
            $item_remarks = $item_remarks . ',';
            $item_remarks_chi = $item_remarks_chi . '，';
        }
    }
    $printer->textChinese($item_name);
    for($space = 0 ; $space < 9 - mb_strlen($item_name, "UTF-8") ; $space++) {
		$printer->textChinese("  ");
	}
    $printer->textChinese("x" . $item_quantity . "\n");
    if ($item_remarks !== '') {
        $printer->textChinese("$item_remarks_chi");
    }
    for($space = 0 ; $space < 9 - mb_strlen($item_remarks_chi, "UTF-8") ; $space++) {
		$printer->textChinese("  ");
	}
    $printer->textChinese("$" . $item_price . "\n");
    
    $result = $result && mysqli_query($db_link, "INSERT INTO `b02`(`B02I01XA`, `B02I02XA`, `B02N03CV0255`, `B02N04MM`, `B02N05CV0255`, `B02N06CV0255`) VALUES ('$item_uuid','$uuid','$item_name','$item_price','$item_remarks', '$item_quantity')");
}

$printer->textChinese("------------------------\n");
$printer->textChinese("總價：$$payment_total");
$printer->feed(2);
$printer->cut();
$printer->close();

echo $result;
