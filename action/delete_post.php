<?php
require_once '../models/post.php';

$id = null;

isset($_GET['id']) ? $id = $_GET['id'] : $id = 1;
if ($id !== null){
    deletePost($id);
    header('location: ../views/add_post.php');
}