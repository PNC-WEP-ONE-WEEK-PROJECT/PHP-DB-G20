<?php
require_once '../templates/header.php';
require_once '../models/post.php';
?>





<div class="container ">
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

<div class=" w-50 float-right">
  <?php
  require_once '../models/post.php';
  $posts = getAllPosts();
  foreach ($posts as $post) :
  ?>
    <div class="card mt-2 w-75 mx-auto shadow p-3 mb-5 bg-white rounded">
      <div class="col">
        <img class="rounded-circle mt-2" src="../images/samoul.jpg" alt="" width="40" hight="20">
        <span class="my-5  h4">Samoul-Kh</span>
        <a href="">
          <p class="float-right mt-1" data-dismiss="modal"><i class="fa fa-ellipsis-v" style="font-size:20px; color:black;"></i></p>
        </a><br>
      </div>
      <div class="card-body">
        <h5 class="card-text"><?= $post['dercipion'] ?></h5>
        <div class="card text-center">
          <img class="card-img-top" src="../images/<?= $post['image'] ?>" alt="Responsive image">
        </div>
        <a href="#"><img src="/images/like.png" width="40" height="40" alt="">Like 100K</a>
        <div class="group-d_e mt-2 float-right">
          <a href="#"><i class="fa fa-edit" style="font-size:30px; color:blue;"></i> </a>
          <a href="../action/delete_post.php?id=<?= $post['postID'] ?>"><i class="fa fa-close" style="font-size:34px; color:red;"></i> </a>
        </div>
      </div>
      <!-- --------------------------------commets form---------------------------- -->
      <div class="dropdown ml-3 mr-3 ">
          <a  href="#" class="comment" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="comment  fa fa-commenting-o" style="font-size:30px; color:blue;"></i> Comment</a>
          <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
            <!-- -----------------------textarea can Comment------------------------------------------------ -->
            <form action="../action/comment.php?id=<?= $post['postID'] ?>" method='POST'>
              <textarea name="content" cols="30" rows="1" required placeholder="Write a comment.." class="form-control"></textarea>
              <button type="submit" name="submit" class="btn btn-default btn-sm bg-primary text-light float-right mt-1" data-dismiss="modal">Comment</button>
            </form>
            <!-- -------------------------------display Comment---------------------------------------------- -->
            <?php
            require_once '../models/post.php';
            $comments = getComment();
            foreach ($comments as $comment) :
              if ($comment["postID"] == $post['postID']) :
            ?>
                <div class="shadow-sm p-2 mb-1 bg-body rounded mt-4">
                  <div class="user_name">
                    <img class="rounded-circle" src="../images/samoul.jpg" alt="" width="20" hight="20">
                    <?= $comment['first_name'] . " " . $comment['last_name'] ?>
                  </div>
                  <div class="user_comment ml-4 text-primary">
                    <?= $comment['content'] ?>
                    <?= $comment["commentID"] ?>
                    <a href="../action/delete-comment.php?id=<?= $comment['commentID'] ?>"><img src="/images/delete.png" width="20" height="20" alt="" class="float-right"></a>
                  </div>
                </div>
                <!-- ---------------------------delete comment---------------------------- -->
              <?php
              endif
              ?>
            <?php
            endforeach ?>
          </div>
      </div>
    </div>

  <?php endforeach; ?>
</div>

</div>
<?php
require_once '../templates/footer.php'; ?>