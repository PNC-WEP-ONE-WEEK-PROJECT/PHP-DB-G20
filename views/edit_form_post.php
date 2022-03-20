<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook 2.0</title>
    <!-- Your style here -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/stype.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




</head>
<body>

<?php
require_once '../models/post.php'; ?>


<div class="content shadow p-3 bg-light rounded ">
  <?php
  require_once '../models/post.php';
  $post = $_GET['id'];
  $posts = getPostsById($post);

  ?>

  <form action="../action/edit_post.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $post ?>">
    <input type="file" name="fileToUpload">
    <div class="mt-2">
      <textarea name="dercipion" class="form-control" placeholder="Caption"><?= $posts['dercipion'] ?></textarea>
      <input type="submit" class="btn btn-primary btn-sm mt-2 float-right" value="Update Post" name="submit">
    </div>
  </form>
</div>
