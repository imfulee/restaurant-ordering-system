<?php
$db_host="localhost";
$db_username="root";
$db_password="12876110";
$db_name="mingyu";
$db_link = mysqli_connect($db_host,$db_username,$db_password,$db_name);
mysqli_query($db_link, "SET NAMES 'utf8'"); 
