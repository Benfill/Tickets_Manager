<?php
$currentDate = date("U");
echo $currentDate . "<br>";
$date = $currentDate - 6600;
$deadline = 1681252750;
$timeSpend = $currentDate - $date;
$timeSpendInHours = $timeSpend / 3600;
if($timeSpend > 59 && $timeSpend < 3600) {
    $time = $timeSpend / 60;
    echo ceil($time);
} else if ($timeSpendInHours < 24) {
    echo ceil($timeSpendInHours);
} else {
    echo "error";
}


