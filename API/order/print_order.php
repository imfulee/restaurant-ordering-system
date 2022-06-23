<?php
require_once('../../vendor/autoload.php');

use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;

// initialize printer with font size options
$connector = new NetworkPrintConnector("192.168.11.100", 9100);
$printer = new Printer($connector);
$printer->setTextSize(2, 2);
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

// insert into b02 and print
$order_list = $data["order_list"];
foreach ($order_list as $order_item) {
    $item_uuid = $order_item["uuid"];
    $item_name = $order_item["item_name"];
    $item_price = $order_item["order_price"];
    $item_quantity = $order_item["quantity"];
    $item_remarks_chi = '';
    foreach ($order_item["item_remarks"] as $key => $value) {
        $item_remarks_chi = $item_remarks_chi . $value["remark"];
        if ($key !== count($order_item["item_remarks"]) - 1) {
            $item_remarks_chi = $item_remarks_chi . '，';
        }
    }
    $printer->textChinese($item_name);
    for ($space = 0; $space < 9 - mb_strlen($item_name, "UTF-8"); $space++) {
        $printer->textChinese("  ");
    }
    $printer->textChinese("x" . $item_quantity . "\n");
    if ($item_remarks !== '') {
        $printer->textChinese("$item_remarks_chi");
    }
    for ($space = 0; $space < 9 - mb_strlen($item_remarks_chi, "UTF-8"); $space++) {
        $printer->textChinese("  ");
    }
    $printer->textChinese("$" . number_format($item_price, 0, '.', ',') . "\n");
}

$payment_str = number_format($payment_total, 0, '.', ',');
$printer->textChinese("------------------------\n");
$printer->textChinese("總價：$$payment_str");
$printer->feed(1);
$printer->cut();
$printer->close();

echo $result;
