<?php
if (!isset($_SESSION['id'])) {
    header("Location: ?p=login");
}

if (!isset($_POST)) {
  $error = 0;
}
else if (isset($_POST['title'])) {
  $error = createArticle();
}
else {
  $error = 1;
}

$cats = listCats();
?>

<div id="form-container">
<?php
    if ($error === 1) {
        ?>
        <div class="erreur">Une erreur s'est produtie lors de la création de l'article.</div>
        <?php
    }
    ?>

    <form method="POST" name="Create" action="?p=create_article">
        <h1 class="page-title">Créer un article :</h1>
        <div>
            <label for="title">Titre : &nbsp;</label>
            <input type="text" placeholder="Ex : Figurine" name="title" required autofocus>
        </div>
        <div>
            <label for="price">Prix : &nbsp;</label>
            <input type="number" placeholder="42" name="price" min="1" required>
        </div>
        <div>
            <label for="category">Catégorie : &nbsp;</label>
            <select name="category" required>
              <?php
                foreach($cats as $cat) {
                  ?><option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option><?php
                }
              ?>
            </select>
        </div>
        <div>
            <label for="description">Description : &nbsp;</label>
            <textarea placeholder="C'est une figurine." name="description" required></textarea>
        </div>

        <p><button type="submit">Créer l'article</button></p>
    </form>
</div>