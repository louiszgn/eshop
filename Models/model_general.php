<?php
function getArticles() {
    require("db_connection.php");
    $req = $pdo->query('SELECT * FROM articles ORDER BY id DESC LIMIT 10');
    $data = $req->fetchAll();
    return $data;
}

function getCats() {
    require("db_connection.php");
    $req = $pdo->query('SELECT * FROM categories ORDER BY id');
    $data = $req->fetchAll();
    return $data;
}

function getArticle($id) {
    require("db_connection.php");
    $req = $pdo->query('SELECT * FROM articles WHERE id = '.$id);
    $data = $req->fetch();
    return $data;
}

function getCat($id) {
    require("db_connection.php");
    $req = $pdo->query('SELECT name FROM categories WHERE id = '.$id);
    $data = $req->fetch();
    return $data;
}

function getUser($id) {
    require("db_connection.php");
    $req = $pdo->query('SELECT name FROM users WHERE id = '.$id);
    $data = $req->fetch();
    return $data;
}

function getComments($id_article) {
    require("db_connection.php");
    $req = $pdo->query('SELECT * FROM comments WHERE id_article = '.$id_article.' ORDER BY id DESC');
    $data = $req->fetchAll();
    return $data;
}

function getUserByName($userName) {
    require("db_connection.php");
    $req = $pdo->query('SELECT * FROM users WHERE name = "'.$userName.'"');
    $data = $req->fetch();
    return $data;
}

function getArticles_User($id_user) {
    require("db_connection.php");
    $req = $pdo->query('SELECT * FROM articles WHERE id_user = '.$id_user.' ORDER BY id DESC');
    $data = $req->fetchAll();
    return $data;
}

function getNbArticles_Cat($id_cat) {
    require("db_connection.php");
    $req = $pdo->query('SELECT COUNT(*) FROM articles WHERE id_category = '.$id_cat);
    $data = $req->fetch();
    return $data;
}

function getArticles_Cat($id_cat) {
    require("db_connection.php");
    $req = $pdo->query('SELECT * FROM articles WHERE id_category = '.$id_cat.' ORDER BY id DESC');
    $data = $req->fetchAll();
    return $data;
}

function getUsers_Names() {
    require("db_connection.php");
    $req = $pdo->query('SELECT name FROM users');
    $data = $req->fetchAll();
    return $data;
}

function setUser($name, $email, $pwd) {
    require("db_connection.php");
    $req = $pdo->prepare('INSERT INTO users (name, mail, pwd) VALUES (:name, :email, :password)');

    $req->execute([
        'name' => $name,
        'email' => $email,
        'password' => $pwd
    ]);
}

function setArticle($user, $title, $price, $cat, $des) {
    require("db_connection.php");
    $req = $pdo->prepare('INSERT INTO articles (id_user, id_category, title, price, description) VALUES (:user, :cat, :title, :price, :description)');

    $req->execute([
        'user' => $user,
        'cat' => $cat,
        'title' => $title,
        'price' => $price,
        'description' => $des
    ]);
}
?>