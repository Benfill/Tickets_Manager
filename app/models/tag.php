<?php
$sql = "SELECT * FROM tag";
$res = $conn->query($sql);
$tagData = [];
while($row = $res->fetch_assoc()) {
    $tagData[] = $row;
}