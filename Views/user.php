<?php
if (!isset($_SESSION['id'])) {
    header("Location: ?p=login");
}

$user = infosUser($_GET['id']);
$articles = listArticles_User($user['id']);
?>

<h1 class="page-title"><?php echo $user['name']; ?></h1>

<?php if($_GET['id'] === $_SESSION['id']) { ?><p class="modify">Modifier</p> <?php } ?>
<script>document.querySelector(".modify").onclick = () => alert("Pas encore disponible");</script>

<div id="user-articles-container">
    <h3>articles de <?php echo $user['name']; ?> :</h3>
    <?php
    foreach($articles as $article) {
        $cat = infosCat($article['id_category']);
        ?>
        <hr>
        <div class="user-article">
            <div>
                <a href="?p=article&id=<?php echo $article['id']; ?>" title="Voir l'article"><strong><?php echo $article['title']; ?></strong></a>
            </div>
            <div>
                <div><strong>Catégorie :</strong><br>
                <a href="?p=category&id=<?php echo $cat['id']; ?>" title="Voir la catégorie"><?php echo $cat['name']; ?></a>
            </div>
        </div>
        <?php
    }
    ?>
</div>
