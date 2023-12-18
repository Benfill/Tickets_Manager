<?php
require_once "../../app/libraries/ticket.php";
if(isset($_GET["ticket_id"])) {
    $ticket_id = $_GET["ticket_id"];
    $_SESSION["ticket_id"] = $ticket_id;

    $ticket = new ticket;
    $ticketData = $ticket->displayTicket($conn, $ticket_id);
    if(!$ticketData) {
        header("Location: " . $url . "public/");
    }
} else {
    header("Location: " . $url . "public/");
}