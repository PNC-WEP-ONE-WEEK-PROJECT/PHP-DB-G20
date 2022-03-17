<!--  -->
<?php require_once'templates/header.php'; ?>

<form action="../action/posts_view.php" method="post" enctype="multipart/form-data" class="border border-2 borml-5 ml-5 mb-5 w-50 vh-25 p-3 mx-auto d-block">

  <input type="file" name="fileToUpload" id="fileToUpload"><br>
  <div class="form-group mb-2">
      <textarea name="dercipion" class="form-control" placeholder="What's you mind?"></textarea>
  </div>
  <input type="submit" class="btn btn-primary btn-sm m-2 float-right" value="Upload" name="submit">
  <input type="submit" class="btn btn-primary btn-sm m-2 float-right" value="Upload" name="submit">
</form>

<?php require_once'templates/footer.php';