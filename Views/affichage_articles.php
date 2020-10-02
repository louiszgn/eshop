<?php
foreach($data as $article) {
    $cat = infosCat($article['id_category']);
    $user = infosUser($article['id_user']);
    ?>
    <div class="article">
        <div>
            <div>
                <h3><a href="?p=article&id=<?php echo $article['id'] ?>" title="Voir l'article"><strong><?php echo $article['title']; ?></strong></a></h3>
            </div>
            <div><?php echo $article['description']; ?></div>
        </div>
        <div><strong>Auteur :</strong><br>
            <h3><a href="?p=user&id=<?php echo $user['id'] ?>" title="Voir l'auteur"><?php echo $user['name']; ?></a></h3>
        </div>
        <div><strong>Catégorie :</strong><br>
            <h3><a href="?p=category&id=<?php echo $cat['id'] ?>" title="Voir la catégorie"><?php echo $cat['name']; ?></a></h3>
        </div>
    </div>
    <hr>
    <?php
}
?>