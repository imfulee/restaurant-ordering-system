<?php 

require_once("../db_config.php");

$data = json_decode(file_get_contents('php://input'), true);
foreach($data as $action){
    if($action["action"] == "add"){
        echo "add\n";
        $remark = $action["remark"];
        $uuid = $action["uuid"];
        echo $remark;
        echo $uuid;
        $result = mysqli_query($db_link, "INSERT INTO `a03`(`A03I01XA`, `A03N02CV0255`) VALUES ('$uuid','$remark')");
        usleep(1000);
    } else if ($action["action"] == "delete"){
        echo "delete\n";
        $uuid = $action["uuid"];
        echo $uuid;
        $result = mysqli_query($db_link, "DELETE FROM `a03` WHERE `A03I01XA` = '$uuid'");
    } else if ($action["action"] == "edit"){
        $remark = $action["remark"];
        $uuid = $action["uuid"];
        echo "edit\n";
        echo $remark;
        echo $uuid;
        $result = mysqli_query($db_link, "UPDATE `a03` SET `A03N02CV0255`='$remark' WHERE `A03I01XA` = '$uuid'");
    }
}
echo $data;


?>