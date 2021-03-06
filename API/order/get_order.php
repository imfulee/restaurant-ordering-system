<?php 

require_once("../db_config.php");

$data = json_decode(file_get_contents('php://input'), true);
$start_date = $data["start_date"];
$end_date = $data["end_date"];
$order_paid = $data["order_paid"] ? 1 : 0;
$date_condition = '';
if(!empty($start_date) || !empty($end_date)){
    $date_condition = "`b01`.`B01D02TD` BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59' AND ";
}

$orders = array();
$orders_query = mysqli_query($db_link, "SELECT * FROM `b01` WHERE " . $date_condition . "`B01N05IT` = '$order_paid' ORDER BY `b01`.`B01D02TD` ASC ");
while ($row = mysqli_fetch_row($orders_query)) {
    $order_items = array();
    $items_query = mysqli_query($db_link, "SELECT * FROM `b02` WHERE `B02I02XA` = '{$row[0]}'");
    while($item_row = mysqli_fetch_row($items_query)){
        $order_items[] = array(
            "item_name" => $item_row[2],
            "quantity" => $item_row[5],
            "item_price" => $item_row[3]
        );
    }
    $orders[] = array("uuid" => $row[0], "date_time" => $row[1], "total_payment" => $row[2], "order_items" => $order_items);
}

echo json_encode($orders);