<?php
require_once '../models/post.php';

$comment =  $_POST["content"];
$postId = $_GET["id"];
$userId = 1;
// echo $comment ;
setComment($comment,$postId,$userId);

header('location: ../index.php');