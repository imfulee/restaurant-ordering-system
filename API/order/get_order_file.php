<?php

require_once("../db_config.php");

$date_condition = '';
if (isset($_POST["start_date"]) && isset($_POST["end_date"]) && $_POST["start_date"] !== "" && $_POST["end_date"] !== "") {
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $date_condition = "`b01`.`B01D02TD` BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59' AND ";
}
$order_paid = $_POST["paid_records"] ? 1 : 0;

$logs = array();

$logs_query = mysqli_query($db_link, "SELECT `b01`.`B01D02TD`, `b02`.`B02N03CV0255`, `b02`.`B02N04MM`, `b02`.`B02N06CV0255` FROM `b01` RIGHT JOIN `b02` ON `B02I02XA` = `b01`.`B01I01XA` WHERE " . $date_condition . "`B01N05IT` = '{$order_paid}' ORDER BY `b01`.`B01D02TD` DESC");


while ($row = mysqli_fetch_row($logs_query)) {
    $logs[] = $row;
}

$filename = "orders-" . time() . ".csv";
$headers = ["日期", "品項項目", "金額", "數量"];
$file = fopen($filename, "w");
fwrite($file, "\xEF\xBB\xBF");
mb_convert_encoding($headers, 'UTF-16LE', 'UTF-8');
fputcsv($file, $headers);
if (!empty($logs)) {
    foreach ($logs as $line) {
        mb_convert_encoding($line, 'UTF-16LE', 'UTF-8');
        fputcsv($file, $line);
    }
}
fclose($file);
ob_end_clean();
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=" . $filename);
header("Content-Transfer-Encoding: binary");
header("Content-Type: application/csv; ");
readfile($filename);
unlink($filename);
exit();
