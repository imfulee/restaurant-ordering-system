<?php

require_once("../db_config.php");

$data = json_decode(file_get_contents('php://input'), true);
foreach($data as $action){
    if($action["action"] == "add"){
        $item_name = $action["item_name"];
        $uuid = $action["uuid"];
        $price = $action["price"];
        $type_uuid = $action["type_uuid"];
        $result = mysqli_query($db_link, "INSERT INTO `a02`(`A02I01XA`, `A02I02XA`, `A02N03CV0255`, `A02N04MM`) VALUES ('$uuid','$type_uuid','$item_name','$price')");
        usleep(1000);
    } else if ($action["action"] == "delete"){
        $uuid = $action["uuid"];
        $result = mysqli_query($db_link, "DELETE FROM `a02` WHERE `A02I01XA` = '$uuid'");
    } else if ($action["action"] == "edit"){
        $item_name = $action["item_name"];
        $price = $action["price"];
        $uuid = $action["uuid"];
        $result = mysqli_query($db_link, "UPDATE `a02` SET `A02N03CV0255`='$item_name',`A02N04MM`='$price' WHERE `A02I01XA` = '$uuid'");
    }
}
echo $result;