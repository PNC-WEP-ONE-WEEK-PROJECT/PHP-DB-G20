<?php
require_once '../models/post.php';

// $id = null;

// isset($_GET['content']) ? $id = $_GET['content'] : $id = 1;
// if ($id !== $_GET['content']){
//     deleteComment($id);
// }
$commet_id = $_GET["id"];
deleteComment($commet_id);
header('location: ../views/add_post.php');