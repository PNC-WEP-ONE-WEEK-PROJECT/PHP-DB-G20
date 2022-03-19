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
    $statement = $database->prepare("SELECT * FROM users where id = :id");
    $statement->execute([
        'id' => $id,
    ]);
    return $statement->fetch;
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
function updateStudent($userID, $frist_name, $last_name, $gender, $email, $password)
{
    global $database;
    $statement = $database->prepare("UPDATE users SET frist_name = :last_name, last_name = :last_name, gender = :gender, email = :email, password = :password");
    $statement->execute([
        ':userID' => $userID,
        ':frist_name' => $frist_name,
        ':last_name' => $last_name,
        ':gender' => $gender,
        ':email' => $email,
        ':password' => $password
    ]);
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
    $statement = $database->prepare("SELECT content,first_name,last_name FROM comments join users on comments.userID=users.userID");
    $statement->execute();
    return $statement->fetchAll();

}
// ---------------------------------delete comment----------------------
// function deleteComment($comment,$postId,$userId){
//     global $database;
//     $statement = $database->prepare("DELETE FROM comments WHERE commentID = :id, postID=:id, userID=:id");
//     $statement->execute([
//         ':id' => $id,
//         ':postID' => $postId,
//         ':userID' => $userID,
//     ]);
//     return $statement->rowCount() > 0;
// }