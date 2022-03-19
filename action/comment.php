<?php
require_once '../models/post.php';

$comment =  $_POST["content"];
$postId = $_GET["id"];
$userId = 1;
echo $postId ;
setComment($comment,$postId,$userId );