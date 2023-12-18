<?php
require_once "../app/libraries/tag.php";
$tag = new tag;
$tagData = $tag->getTags($conn);