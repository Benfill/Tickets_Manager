<?php
require_once "../app/libraries/tag.php";
require_once "../app/models/tagModel.php";
$tag = new tag;
$tagModel = new tagModel;
$tagData = $tag->getTags($conn, $tagModel);