<?php

class tag
{
    private $tagModel;

    function getTags($conn, $tagModel)
    {
        $this->tagModel = $tagModel;
        $this->tagModel->__set("conn", $conn);
        return $this->tagModel->getAllTags();
    }

    function GetSpecificTags($conn, $ticket_id, $tagModel)
    {
        $this->tagModel = $tagModel;
        $this->tagModel->__set("conn", $conn);
        $this->tagModel->__set("ticket_id", $ticket_id);
        return $this->tagModel->getArticleTags();
    }
}