<?php
class tag
{
    private $tagModel;
    function __construct()
    {
        require_once "../../app/models/tagModel.php";
        $this->tagModel = new tagModel;
    }
    function getTags($conn)
    {
        $this->tagModel->__set("conn", $conn);
        return $this->tagModel->getAllTags();
    }

    function GetSpecificTags($conn, $ticket_id)
    {
        $this->tagModel->__set("conn", $conn);
        $this->tagModel->__set("ticket_id", $ticket_id);
        return $this->tagModel->getArticleTags();
    }
}