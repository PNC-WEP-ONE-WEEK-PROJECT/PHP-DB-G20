<?php
require_once('database.php');

//fucnion to getPosts
function getAllPosts() 
{
    global $database;
    $statement = $database->prepare("SELECT * FROM posts order by postID DESC");
    $statement->execute();
    return $statement->fetchAll();
}

//function to getPostsById
function getPostsById($id) 
{
    global $database;
    $statement = $database->prepare("SELECT * FROM posts where postID = :id");
    $statement->execute([
        'id' => $id,
    ]);
    return $statement->fetch();
}

//function to deletePost
function deletePost($id)
{
    global $database;
    $statement = $database->prepare("DELETE FROM posts WHERE postID = :id");
    $statement->execute([
        ':id' => $id,
    ]);
    return $statement->rowCount() > 0;
}   

//function to updatePost
function updateStudent($dercipion, $postID, $image)
{
    global $database;
    if($dercipion != null || $image != null){
        $statement=$database->prepare('UPDATE posts SET dercipion= :dercipion, image= :image WHERE postID = :postID');
        $statement ->execute([
            ':dercipion' => $dercipion,
            ':postID' => $postID,
            ':image' => $image,
            
        ]);

    }
}


// function to create Post
function createPost($dercipion, $userID, $image)
{
    global $database;
    if($dercipion != null || $image != null){
        $statement=$database->prepare('INSERT INTO posts (dercipion,userID,image) VALUES(:dercipion,:userID, :image)');
        $statement ->execute([
            ':dercipion' => $dercipion,
            ':userID' => $userID,
            ':image' => $image,
            
        ]);
    }
}


// ----------------------------------------comment on post----------------------------------------------------------------------------------------------------------------------------------------------------------

//--------------------------------------- set comment on database-----------------------------------------
function setComment($comment,$postId,$userId){
    global $database;
    $statement = $database->prepare("INSERT INTO comments(content,userID,postID) VALUES(:content,:userID,:postID)");
    $statement->execute([
         ':content' => $comment,
         ':postID' => $postId,
         ':userID' => $userId
    ]);
    return ($statement->rowCount()==1);
}


//------------------------------------- get comment from database------------------------------------
function getComment(){
    global $database;
    $statement = $database->prepare("SELECT commentID,postID, content,first_name,last_name FROM comments join users on comments.userID=users.userID");
    $statement->execute();
    return $statement->fetchAll();

}
// ---------------------------------delete comment----------------------
function deleteComment($comment_id){
    global $database;
    $statement = $database->prepare("DELETE FROM comments WHERE commentID = :id");
    $statement->execute([
        ':id' => $comment_id
    ]);
    return $statement->rowCount() > 0;
}