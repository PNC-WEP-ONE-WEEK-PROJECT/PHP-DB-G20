<?php 
require_once'../models/post.php';

$postsID = $_POST['id'];
$dercipion =$_POST['dercipion'];
$image = $_FILES['fileToUpload']['name'];
updateStudent($dercipion, $postsID, $image);
move_uploaded_file($_FILES['fileToUpload']['tmp_name'],'../images/'.$image);
header('location: ../index.php');


