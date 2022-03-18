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

// function addToPostList ($description,$user_id,$image)
// {
//     global $database;
//     if($description != null || $image != null){
//         $conts=$database->prepare("INSERT INTO posts (description,user_id,image) VALUES (:description,:user_id,:image)");
//         $conts->execute([
//             ':description' => $description,
//             ':user_id' => $user_id,
//             ':image' => $image,
//         ]);
//     }
// }


// function edit_post($dercipion){
//     global $database;
//     $statement = $database->prepare("EDIT FROM posts WHERE dercipion = :dercipion");
//     $statement->execute([
//         ':dercipion' => $dercipion,
//     ]);


// }