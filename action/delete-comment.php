<?php
require_once '../models/post.php';

$commet_id = $_GET["id"];
deleteComment($commet_id);
header('location: ../index.php');