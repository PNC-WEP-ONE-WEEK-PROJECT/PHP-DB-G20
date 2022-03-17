<?php
require_once '../models/post.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $dercipion = $_POST['dercipion'];
    $text = $_POST['text'];
    if(!empty($dercipion) and !empty($text))
    {
        $isCreated = createPost($dercipion,$text1);
        if($isCreated){
            header('location:../views/post_view.php');
        }else{
            header('location:../views/form_view.php');
        }
    }
}
?>
