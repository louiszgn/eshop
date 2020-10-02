<?php
function logo() {
    $logo_nb = rand(1, 17);
    return $logo_nb;
}

function listArticles() {
    require_once("Models/model_general.php");
    $articles = getArticles();
    return $articles;
}

function listCats() {
    require_once("Models/model_general.php");
    $cats = getCats();
    return $cats;
}

function listArticles_User($id_user) {
    require_once("Models/model_general.php");
    $articles = getArticles_User($id_user);
    return $articles;
}

function listArticles_Cat($id_cat) {
    require_once("Models/model_general.php");
    $articles = getArticles_Cat($id_cat);
    return $articles;
}

function listComments($id_article) {
    require_once("Models/model_general.php");
    $comments = getComments($id_article);
    return $comments;
}

function infosCat($id) {
    require_once("Models/model_general.php");
    $cat = getCat($id);
    $tab['id'] = $id;
    $tab['name'] = $cat['name'];
    return $tab;
}

function infosUser($id) {
    require_once("Models/model_general.php");
    $user = getUser($id);
    $tab['id'] = $id;
    $tab['name'] = $user['name'];
    return $tab;
}

function infosArticle($id) {
    require_once("Models/model_general.php");
    $article = getArticle($id);
    $tab['id'] = $id;
    $tab['id_user'] = $article['id_user'];
    $tab['id_category'] = $article['id_category'];
    $tab['title'] = $article['title'];
    $tab['price'] = $article['price'];
    $tab['description'] = $article['description'];
    return $tab;
}

function nbArticles_Cat($id_cat) {
    require_once("Models/model_general.php");
    $articles = getNbArticles_Cat($id_cat);
    return $articles;
}

function confirmSignin() {
    require_once("Models/model_general.php");
    $error = 0;

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
        $names = getUsers_Names();
        foreach($names as $name) {
            if ($_POST['name'] === $name['name']) {
                $error = 2;
            }
        }

        if ($error === 0) {
            $safeName = htmlspecialchars($_POST['name']);
            $safeEmail = htmlspecialchars($_POST['email']);
            $safePwd = password_hash($_POST['password'], PASSWORD_DEFAULT);

            setUser($safeName, $safeEmail, $safePwd);

            $user = getUserByName($safeName);
            $_SESSION['id'] = $user['id'];
            $_SESSION['statut'] = $user['statut'];
        }
    }
    else {
        $error = 1;
    }

    return $error;
}

function confirmLogin() {
    require_once("Models/model_general.php");
    $error = 1;

    if (isset($_POST['name']) && isset($_POST['password'])) {
        $names = getUsers_Names();
        foreach($names as $name) {
            if ($_POST['name'] === $name['name']) {
                $error = 0;
            }
        }
        echo $error;

        if ($error === 0) {
            $infosUser = getUserByName($_POST['name']);
            
            if(password_verify($_POST['password'], $infosUser['pwd'])) {
                $_SESSION['id'] = $infosUser['id'];
                $_SESSION['statut'] = $infosUser['statut'];
            }
            else {
                $error = 2;
            }
        }
    }

    return $error;
}

function logout() {
    unset($_SESSION["id"]);
    unset($_SESSION["statut"]);
    header("Location: /eshop/");
}

function createArticle() {
    require_once("Models/model_general.php");

    if (isset($_POST['title']) && isset($_POST['price']) && isset($_POST['category']) && isset($_POST['description'])) {
        $error = 0;

        $safeTitle = htmlspecialchars($_POST['title']);
        $safePrice = htmlspecialchars($_POST['price']);
        $safeCat = htmlspecialchars($_POST['category']);
        $safeDes = htmlspecialchars($_POST['description']);

        setArticle($_SESSION['id'], $safeTitle, $safePrice, $safeCat, $safeDes);

        header("Location: /eshop/");
    }

    return $error;
}
?>