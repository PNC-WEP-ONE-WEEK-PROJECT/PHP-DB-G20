<?php
require_once('database.php');

//fucnion to getPosts
function getPosts() 
{
    global $database;
    $statement = $database->prepare("SELECT * FROM posts order by id");
    $statement->execute();
    return $statement->fetchAll();
}

//function to getPostsById
function getPostsById($id) 
{
    global $database;
    $statement = $database->prepare("SELECT * FROM posts where id = :id");
    $statement->execute([
        'id' => $id,
    ]);
    return $statement->fetch;
}

//function to create Post
function createPost($post)
{
    
    global $database;
    $text = $post['text'];
    $statement = $database->prepare("INSERT INTO posts(text) values(:text)");
    $statement->execute([
        ':text' => $text,
    ]);
} 

//function to updatePost
function updatePost($post)
{
    global $database;
    $text = $post['text'];
    $statement = $database->prepare("UPDATE posts SET text = :text WHERE id = :id" );
    $statement->execute([
        ':text' => $text,
        ':id' =>'id',
    ]);
}

//function to deletePost
function deletePost($id)
{
    global $database;
    $statement = $database->prepare("DELETE FROM posts WHERE id = :id");
    $statement->execute([
        ':id' => $id,
    ]);
}
