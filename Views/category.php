<?php
$cat = infosCat($_GET['id']);
$nb_articles = nbArticles_Cat($cat['id']);
$articles = listArticles_Cat($cat['id']);
?>

<h1 class="page-title"><?php echo $cat['name']; ?></h1><br>

<div id="categories-container">
    <?php
    foreach($articles as $article) {
        $user = infosUser($article['id_user']);
        ?>
        <div class="category">
            <div>
                <a href="?p=article&id=<?php echo $article['id']; ?>" title="Voir l'article"><strong><?php echo $article['title']; ?></strong></a>
            </div>
            <div>
                <div><strong>Auteur :</strong><br></div>
                <a href="?p=user&id=<?php echo $user['id']; ?>" title="Voir le profil"><?php echo $user['name']; ?></a>
            </div>
        </div>
        <hr>
        <?php
    }
    ?>
</div>
