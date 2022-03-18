<?php 
require_once'../templates/header.php';
?>
<div class="container mt-3">
    <?php
    require_once'../models/post.php';
    $posts = getAllPosts();
    foreach($posts as $post):
    ?>
    <div class="card mt-2 w-75 mx-auto">
        <div class="col">
            <img class="rounded-circle" src="../images/samoul.jpg" alt="" width="40" hight="20" >
            <span class="my-5 h4">Samoul</span>
        </div>
        <div class="card-body ">
            <h1 class="card-text"><?= $post['dercipion'] ?></h1>

            <a href="" class="card-li  btn-primary btn-sm float-right ml-2">edit</a>
            <a href="../action/delete_post.php?id=<?=$post['postID']?>" class="btn btn-danger btn-sm float-right">delete</a>

            <img class="card-img-top"src="../images/<?= $post['image']?>" width="350" height="400" alt="">
            
            
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php
require_once'../templates/footer.php';?>