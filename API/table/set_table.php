<?php 

require_once("../db_config.php");

$data = json_decode(file_get_contents('php://input'), true);
foreach($data as $action){
    if($action["action"] == "add"){
        $name = $action["table_name"];
        $uuid = $action["uuid"];
        $result = mysqli_query($db_link, "INSERT INTO `a01`(`A01I01XA`, `A01N02CV0255`) VALUES ('$uuid','$name')");
    } else if ($action["action"] == "delete"){
        $uuid = $action["uuid"];
        $result = mysqli_query($db_link, "DELETE FROM `a01` WHERE `A01I01XA` = '$uuid'");
    } else if ($action["action"] == "edit"){
        $name = $action["table_name"];
        $uuid = $action["uuid"];
        $result = mysqli_query($db_link, "UPDATE `a01` SET `A01N02CV0255`='$name' WHERE `A01I01XA` = '$uuid'");
    }
}
echo $result;


?>