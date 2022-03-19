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
<div class="container mt-3 w-75">
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
        <div class="card-body">
            <h1 class="card-text"><?= $post['dercipion'] ?></h1>

            <a href="" class="btn btn-primary btn-sm float-right ml-2">Edit</a>
            <a href="../action/delete_post.php?id=<?=$post['postID']?>" class="btn btn-danger btn-sm float-right">Delete</a>

              <div class="card text-center">
                <img class="card-img-top" src="../images/<?= $post['image']?>" alt="Responsive image">
              </div>
        </div>
          <div>
            <!-- -----------------------textarea can Comment------------------------------------------------ -->
            <form action="../action/comment.php?id=<?=$post['postID']?>" method='POST'>
      
              <textarea name="content" cols="30" rows="1" required placeholder="Write a comment.."  ></textarea><br>
              <button type="submit" name="submit"  class="btn btn-primary" >Comment</button>
            </form>
          </div>
          <!-- -------------------------------display Comment---------------------------------------------- -->
            <?php
              require_once '../models/post.php';
              $comments = getComment();
              foreach($comments as $comment):
                if ( $comment["postID"] == $post['postID']):
            ?>
                  <div class="shadow-sm p-3 mb-5 bg-body rounded">
                    <div class="user_name">
                      <?= $comment['first_name']." ".$comment['last_name']?>
                    </div>
                    <div class="user_comment">
                      <?=$comment['content']?>
                      <?= $comment["commentID"] ?>
                    </div>
                    <a href="../action/delete-comment.php?id=<?=$comment['commentID']?>" class="btn btn-danger btn-sm float-right ml-2">Delete</a>
                </div>
                <!-- ---------------------------delete comment---------------------------- -->
            <?php 
            endif
            ?>
            <?php 
            endforeach ?>
            </div>
    <?php endforeach; ?>
    </div>
    
  </div>


<?php
require_once'../templates/footer.php';?>