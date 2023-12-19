<?php
require_once "../../app/libraries/ticket.php";
require_once "../../app/libraries/tag.php";
require_once "../../app/models/tagModel.php";
if(isset($_GET["ticket_id"])) {
    $ticket_id = $_GET["ticket_id"];
    $_SESSION["ticket_id"] = $ticket_id;

    $ticket = new ticket;
    $ticketData = $ticket->displayTicket($conn, $ticket_id);
    $tag = new tag;
    $tagModel = new tagModel;
    $tags = $tag->GetSpecificTags($conn, $ticket_id, $tagModel);
    if(!$ticketData) {
        header("Location: " . $url . "public/");
    }
} else {
    header("Location: " . $url . "public/");
}