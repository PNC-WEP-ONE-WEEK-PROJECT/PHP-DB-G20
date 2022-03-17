<!--  -->
<?php require_once'templates/header.php';require_once'models/post.php';?>

      <div class="container">

              <form action="../action/posts_view.php" method="post" enctype="multipart/form-data">
              <!-- Trigger the modal with a button --
              <!-- Modal -->

              <div class="modal fade" id="myModal" role="dialog">
                
                <div class="modal-dialog ">
                  <div class="modal-content">
                      <div class="modol-header mb-2">
                            <input type="file" name="fileToUpload" id="fileToUpload"><br>
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

