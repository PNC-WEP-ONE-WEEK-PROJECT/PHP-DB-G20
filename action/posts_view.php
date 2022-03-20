<?php
require_once '../models/post.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $dercipion = $_POST['dercipion'];
    $image = $_FILES['fileToUpload']['name'];
    echo '<pre>';
    print_r($_FILES['fileToUpload']);
    echo '</pre>';
    $statment = '../images/'.$image;
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$statment);
    // $text = $_POST['text'];
    if(!empty($dercipion))
    {
        $isCreated = createPost($dercipion,1,$image);
        
        header('location: ../index.php');
        
    }
}
?>
