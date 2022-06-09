<?php
$db_host="localhost";
$db_username="root";
$db_password="12876110";
$db_name="mingyu";
$db_link=@mysqli_connect($db_host,$db_username,$db_password,$db_name);
if($db_link->connect_error !=""){
    // echo "連線失敗";
}
else{$db_link->query("SET NAMES 'utf8'"); }
?>
