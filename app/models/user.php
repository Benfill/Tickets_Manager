<?php
$sql = "SELECT * FROM user";
$res = $conn->query($sql);
$tagData = [];
while($row = $res->fetch_assoc()) {
    $usersData[] = $row;
}