<?php 
require_once'../templates/header.php';
require_once'../models/post.php';
?>





<div class="container">
              <form action="../action/posts_view.php" method="post" enctype="multipart/form-data">
              <!-- Trigger the modal with a button --
               Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                
                <div class="modal-dialog ">
                  <div class="modal-content">
                      <div class="modol-header mb-2">
                            <input type="file" name="fileToUpload"><br>
                      </div>
                      <div class="modal-body">
                      <textarea name="dercipion" class="form-control" placeholder="Caption"></textarea>
                      <!-- <input type="text" name="text" class="form-control" placeholder="What's you mind?" -->
                      </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-primary" value="Upload" name="submit">
                      <button type="button" class="btn btn-default bg-danger text-light" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
      </div>
</form>
</div>

<!-- -----------------------------------display all post --------------------------------------------------- -->
<div class="container mt-3">
    <?php
    require_once '../models/post.php';
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
          <div>
            <!-- -----------------------textarea can Comment------------------------------------------------ -->
            <form action="../action/comment.php?id=<?=$post['postID']?>" method='POST'>
      
              <textarea name="content" cols="30" rows="10" ></textarea><br>
              <button type="submit" name="submit">Comment</button>
            </form>
          </div>
          <!-- -------------------------------display Comment---------------------------------------------- -->
          <div class="comment-box">
            <?php
              require_once '../models/post.php';
              $comments = getComment();
              foreach($comments as $comment):
            ?>
                <div class="shadow-sm p-3 mb-5 bg-body rounded"><?= $comment['first_name'],$comment['last_name'],$comment['content']?></div>
                <!-- ---------------------------delete comment---------------------------- -->
                <!-- <div >
                <?php
                // require_once '../models/post.php';
                $getDeletes = deleteComment($comment,$postId,$userId);
                foreach($getDeletes as $getDelete):
                ?>
                  <button class="card-li  btn-primary btn-sm float-right ml-2">edit</button>
                  <button class="btn btn-danger btn-sm float-right">delete</button>
                <?php endforeach?>
                </div> -->
            <?php endforeach?>
            </div>
    </div>
    
    <?php endforeach; ?>
</div>


<?php
require_once'../templates/footer.php';?>