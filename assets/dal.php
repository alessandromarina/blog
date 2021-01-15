<?php
$con = new mysqli('127.0.0.1', 'root', 'banana', 'blog');
function SelectPost($c, $type)
{
    global $con;
    if ($type == 0) {
        $stmt = $con->prepare("SELECT id_post, title, description, image FROM post WHERE id_post=?");
        $stmt->bind_param('i', $c);
        $stmt->execute();
        return  $stmt->get_result();
    } else if ($type == 1) {
        $stmt = $con->prepare("SELECT id_post, title, description, image FROM post ORDER BY date DESC LIMIT ?,10");
        $stmt->bind_param('i', $c);
        $stmt->execute();
        return  $stmt->get_result();
    } else if ($type == 2) {
        $stmt = $con->prepare("SELECT count(id_post) FROM post");
        $stmt->execute();
        return  $stmt->get_result();
    } else {
        $stmt = $con->prepare("SELECT id_post, title FROM post");
        $stmt->execute();
        return  $stmt->get_result();
    }
}
function SelectRate($iduser, $idpost, $type)
{
    global $con;
    if ($type == 0) {
        $stmt = $con->prepare("SELECT fk_id_user FROM rate WHERE fk_id_user=? AND fk_id_post=?");
        $stmt->bind_param('ii', $iduser, $idpost);
        $stmt->execute();
        return  $stmt->get_result();
    } else if ($type == 1) {
        $stmt = $con->prepare("SELECT fk_id_user FROM rate WHERE fk_id_user=(SELECT id_user FROM user WHERE username=?) AND fk_id_post=?");
        $stmt->bind_param('si', $iduser, $idpost);
        $stmt->execute();
        return  $stmt->get_result();
    } else {
        $stmt = $con->prepare("SELECT count(id_like) AS liken FROM rate INNER JOIN user ON fk_id_user=id_user AND fk_id_post=?");
        $stmt->bind_param('i', $idpost);
        $stmt->execute();
        return  $stmt->get_result();
    }
}
function SelectTop10($type)
{
    global $con;
    if ($type == 0) {
        $stmt = $con->prepare("SELECT post.id_post, post.title, post.description, post.image, count(id_like) AS likes FROM post INNER JOIN rate ON id_post = fk_id_post GROUP BY id_post ORDER BY likes DESC LIMIT 0,10 ");
        $stmt->execute();
        return  $stmt->get_result();
    } else if ($type == 1) {
        $stmt = $con->prepare("SELECT post.title, count(id_like) AS likes FROM post INNER JOIN rate ON id_post = fk_id_post GROUP BY id_post ORDER BY likes DESC LIMIT 0,10 ");
        $stmt->execute();
        return  $stmt->get_result();
    } else {
        $stmt = $con->prepare("SELECT username,  count(id_comment) AS comments FROM comment INNER JOIN user ON fk_id_user=id_user GROUP BY username ORDER BY comments DESC LIMIT 0,10 ");
        $stmt->execute();
        return  $stmt->get_result();
    }
}

function SelectUser($username,  $type)
{
    global $con;
    if ($type == 0) {
        $stmt = $con->prepare("SELECT id_user, passcode, username, email FROM user WHERE username=?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        return  $stmt->get_result();
    } else if ($type == 1) {
        $stmt = $con->prepare("SELECT username FROM user WHERE username=?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        return  $stmt->get_result();
    } else if ($type == 2) {
        $stmt = $con->prepare("SELECT email FROM user WHERE email=?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        return  $stmt->get_result();
    } else if ($type == 3) {
        $stmt = $con->prepare("SELECT id_user FROM user WHERE username=?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        return  $stmt->get_result();
    } else if ($type == 4) {
        $stmt = $con->prepare("SELECT id_user, image FROM user WHERE username=?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        return  $stmt->get_result();
    } else  if ($type == 5) {
        $stmt = $con->prepare("SELECT image FROM user WHERE id_user=?");
        $stmt->bind_param('i', $username);
        $stmt->execute();
        return  $stmt->get_result();
    } else {
        $stmt = $con->prepare("SELECT image FROM user WHERE username=?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        return  $stmt->get_result();
    }
}
function SelectComment($id, $type)
{
    global $con;
    if ($type == 0) {
        $stmt = $con->prepare("SELECT fk_id_user, user, description FROM comment WHERE fk_id_post=? ORDER BY id_comment DESC");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return  $stmt->get_result();
    } else  if ($type == 1) {
        $stmt = $con->prepare("SELECT count(id_comment) AS ncomments FROM comment WHERE fk_id_post=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return  $stmt->get_result();
    } else {
        $stmt = $con->prepare("SELECT description,user,fk_id_post FROM comment WHERE fk_id_user=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return  $stmt->get_result();
    }
}
function DeleteLike($iduser, $idpost)
{
    global $con;
    $stmt =  $con->prepare("DELETE FROM rate WHERE fk_id_user=? AND fk_id_post=?");
    $stmt->bind_param('ii', $iduser, $idpost);
    $stmt->execute();
}
function InsertComment($username, $email, $comment, $iduser, $idpost)
{
    global $con;
    if ($iduser) {
        $stmt = $con->prepare("INSERT INTO comment (user, email, description, fk_id_user, fk_id_post) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssii', $username, $email, $comment, $iduser, $idpost);
        $stmt->execute();
    } else {
        $stmt = $con->prepare("INSERT INTO comment (user, email, description, fk_id_user, fk_id_post) VALUES (?, ?, ?, NULL, ?)");
        $stmt->bind_param('sssi', $username, $email, $comment, $idpost);
        $stmt->execute();
    }
}
function InsertLike($iduser, $idpost)
{
    global $con;
    $stmt =  $con->prepare("INSERT INTO rate (fk_id_user, fk_id_post) VALUES (?, ?)");
    $stmt->bind_param('ii', $iduser, $idpost);
    $stmt->execute();
}
function InsertUser($directory, $username, $firstname, $lastname, $email, $hash)
{
    global $con;
    $stmt =  $con->prepare("INSERT INTO user (image, username ,firstname, lastname, email, passcode) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssss', $directory, $username, $firstname, $lastname, $email, $hash);
    $stmt->execute();
}
