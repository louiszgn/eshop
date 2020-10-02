<?php
if (isset($_SESSION['id'])) {
    header("Location: /eshop/");
}

if (isset($_POST['name'])) {
    $error = confirmLogin();
}
else {
    $error = 3;
}

if ($error === 0) {
    header("Location: /eshop/");
}

if (($error === 1) || ($error === 2) || ($error === 3)) {
?>
    <div id="form-container">
        <?php
        if ($error === 1) {
            ?>
            <div class="erreur">Ce nom n'existe pas.</div>
            <?php
        }
        if ($error === 2) {
            ?>
            <div class="erreur">Le mot de passe est incorrect.</div>
            <?php
        }
        ?>

        <form method="POST" name="Connexion" action="?p=login">
            <h1 class="page-title">Connexion :</h1>
            <div>
                <label for="name">Nom : &nbsp;</label>
                <input type="text" placeholder="Ex : Gnocchi" name="name" <?php if ($error === 2) { ?> value="<?php echo $_POST['name']; ?>" <?php } ?> required autofocus>
            </div>
            <div>
                <label for="password">Mot de passe : &nbsp;</label>
                <input type="password" placeholder="*******" name="password" required>
            </div>

            <p><button type="submit">Se connecter</button></p>
            <p>Pas encore inscrit ? <a href="?p=signin">Cliquez ici !</a></p>
        </form>
    </div>
<?php } ?>