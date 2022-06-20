<?php 
require_once("../db_config.php");
$result = true;

// get the table uuid in JSON form
$data = json_decode(file_get_contents('php://input'), true);
$b01_uuid = $data["b01_uuid"];

$result = mysqli_query($db_link, "UPDATE `b01` SET `B01N05IT`='1' WHERE `B01I01XA` = '$b01_uuid'");

echo json_encode(array(
    "checkout_result" => $result
));
