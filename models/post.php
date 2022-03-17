<?php
require_once('database.php');

//fucnion to getPosts
function getPosts() 
{
    global $database;
    $statement = $database->prepare("SELECT * FROM users order by id");
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
    $statement = $database->prepare("DELETE FROM users WHERE id = :id");
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
function createPost($dercipion, $userID)
{
    global $database;
    $statement=$database->prepare('INSERT INTO posts (dercipion,userID) VALUES(:dercipion,:userID)');
    $statement ->execute([
        ':dercipion' => $dercipion,
        ':userID' => $userID
    ]);
    return $statement->rowCount()>0;
}

