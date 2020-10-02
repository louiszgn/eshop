<?php session_start(); require_once('Composers/composer_general.php');

if (!isset($_GET['p'])) {
    $_GET['p'] = " ";
}

switch ($_GET['p']) {
    case " ":
        $_SESSION['title'] = "Bienvenue";
        break;
    case "article":
        $title = infosArticle($_GET['id']);
        $_SESSION['title'] = $title['title'];
        break;
    case "create_article":
        $_SESSION['title'] = "Créer un article";
        break;
    case "user":
        $title = infosUser($_GET['id']);
        $_SESSION['title'] = $title['name'];
        break;
    case "categories":
        $_SESSION['title'] = "Catégories";
        break;
    case "category":
        $title = infosCat($_GET['id']);
        $_SESSION['title'] = $title['name'];
        break;
    case "signin":
        $_SESSION['title'] = "Inscription";
        break;
    case "login":
        $_SESSION['title'] = "Connexion";
        break;
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php require_once('head.php'); ?>
    </head>
    <body>
        <?php require_once('Views/header.php'); ?>

        <div id="page-container">
            <?php
            switch ($_GET['p']) {
                case " ":
                    require_once('Views/index.php');
                    break;
                case "article":
                    require_once('Views/article.php');
                    break;
                case "create_article":
                    require_once('Views/create_article.php');
                    break;
                case "user":
                    require_once('Views/user.php');
                    break;
                case "categories":
                    require_once('Views/categories.php');
                    break;
                case "category":
                    require_once('Views/category.php');
                    break;
                case "signin":
                    require_once('Views/signin.php');
                    break;
                case "login":
                    require_once('Views/login.php');
                    break;
                case "logout":
                    require_once('Views/logout.php');
                    break;
            }
            ?>
        </div>
    </body>
</html>