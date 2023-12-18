<?php
require_once "../config/config.php";
require_once "../libraries/ticket.php";

$comments = new ticket;
$ticket_id = $_SESSION["ticket_id"];
$comments = $comments->displayComments($conn, $ticket_id);
echo $comments;