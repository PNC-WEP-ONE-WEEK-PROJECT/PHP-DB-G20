
<?php 
require_once'../templates/header.php';?>


<div class="container mt-3">
    <?php
    require_once'../models/post.php';
    $posts = getPosts();
    foreach($posts as $post):
    ?>

    <div class="card mt-2 w-75 mx-auto">
        <div class="card-body">
            <h1 class="card-text"><?php echo $post['dercipion'] ?></h1>
            <!-- <p class="card-text"><?php echo $post['text'] ?></p> -->
            <a href="" class="card-li  btn-primary btn-sm float-right ml-2">edit</a>
            <a href="" class="card-li btn-danger btn-sm float-right">delete</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php
require_once'../templates/footer.php';?>