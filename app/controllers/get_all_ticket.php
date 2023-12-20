<?php
require_once "../config/config.php";
require_once "../../app/libraries/ticket.php";
require_once "../../app/libraries/tag.php";
require_once "../../app/libraries/assignment.php";
require_once "../../app/models/tagModel.php";

$tag = new tag();
$tagModel = new tagModel();
$ticket = new ticket();
$assign = new assignment();
$tickets = $ticket->displayAllTickets($conn);

$tags = $tag->GetSpecificTags($conn, 17, $tagModel);
$assignment = $assign->getAssignment($conn, 17);

$ticketsData = [


];
print_r($assignment);
print_r($tags);
