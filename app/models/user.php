<?php
$sql = "SELECT * FROM user";
$res = $conn->query($sql);
$usersData = [];
while($row = $res->fetch_assoc()) {
    $usersData[] = $row;
}