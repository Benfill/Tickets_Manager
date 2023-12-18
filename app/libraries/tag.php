<?php
class tag {
    function getTags($conn) {
        require_once "../app/models/tagModel.php";
        $tagModel = new tagModel;
        $tagModel->__set("conn", $conn);
        return $tagModel->getAllTags();
    }
}