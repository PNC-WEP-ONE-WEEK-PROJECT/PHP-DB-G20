<?php
require_once '../models/post.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $dercipion = $_POST['dercipion'];
    if(!empty($dercipion)){
        $isCreated = createPost($dercipion,1);
        if($isCreated){
            header('location:../index.php');
        }else{
            header('location:../views/form_view.php');
        }
    }
}
?>
