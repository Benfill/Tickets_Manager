<?php
require_once "../../app/libraries/ticket.php";
require_once "../../app/libraries/tag.php";
require_once "../../app/models/tagModel.php";
require_once "../../app/models/assignmentModel.php";
require_once "../../app/libraries/assignment.php";

if(isset($_GET["ticket_id"])) {
    $ticket_id = $_GET["ticket_id"];

    $ticket = new ticket;
    $ticketData = $ticket->displayTicket($conn, $ticket_id);
    $tag = new tag;
    $assign = new assignment();
    $tagModel = new tagModel;
    $tags = $tag->GetSpecificTags($conn, $ticket_id, $tagModel);

    $tagData = $tag->getTags($conn, $tagModel);
    $tags = $tag->GetSpecificTags($conn, $ticket_id, $tagModel);
    $assignment = $assign->getAssignment($conn, $ticket_id);
    if(!$ticketData) {
        header("Location: " . $url . "public/");
    }
} else {
    header("Location: " . $url . "public/");
}