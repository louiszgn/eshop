<?php
$cats = listCats();  
?>

<h1 class="page-title">Toutes les catégories</h1><br>

<div id="categories-container">
    <?php
    foreach($cats as $cat) {
        $nb_articles = nbArticles_Cat($cat['id']);
        ?>
        <div class="category">
            <div>
                <a href="?p=category&id=<?php echo $cat['id']; ?>" title="Voir la catégorie"><strong><?php echo $cat['name']; ?></strong></a>
            </div>
            <div>
                <div><strong>articles :</strong><br></div>
                <p><?php echo $nb_articles['0']; ?></p>
            </div>
        </div>
        <hr>
        <?php
    }
    ?>
</div>
