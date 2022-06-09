<?php 

require_once("../db_config.php");

$data = json_decode(file_get_contents('php://input'), true);
foreach($data as $action){
    if($action["action"] == "add"){
        $type = $action["type"];
        $uuid = $action["uuid"];
        $result = mysqli_query($db_link, "INSERT INTO `a04`(`A04I01XA`, `A04N02CV0255`) VALUES ('$uuid','$type')");
    } else if ($action["action"] == "delete"){
        $uuid = $action["uuid"];
        $result = mysqli_query($db_link, "DELETE FROM `a04` WHERE `A04I01XA` = '$uuid'");
    } else if ($action["action"] == "edit"){
        $type = $action["type"];
        $uuid = $action["uuid"];
        $result = mysqli_query($db_link, "UPDATE `a04` SET `A04N02CV0255`='$type' WHERE `A04I01XA` = '$uuid'");
    }
}
echo $result;


?>