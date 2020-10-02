<?php
if (isset($_SESSION['id'])) {
    header("Location: /eshop");
}

if (isset($_POST['name'])) {
    $error = confirmSignin();
}
else {
    $error = 3;
}

if ($error === 0) {
    ?>
    <div id="form-container">
        <meta http-equiv="refresh" content="3; URL=/">
        <div class="congrats">Votre inscription a bien été éffectuée !</div>
    </div>
    <?php
}

if (($error === 1) || ($error === 2) || ($error === 3)) {
?>
    <div id="form-container">
        <?php
        if ($error === 2) {
            ?>
            <div class="erreur">Ce nom est déjà pris, veuillez en choisir un autre.</div>
            <?php
        }
        ?>

        <div id="pas-bien" class="erreur hidden">Problème de confirmation !</div>

        <form method="POST" name="Inscription" action="?p=signin" onsubmit="return validateForm()">
            <h1 class="page-title">Inscription :</h1>
            <div>
                <label for="name">Nom : &nbsp;</label>
                <input type="text" placeholder="Ex : Gnocchi" name="name" <?php if ($error === 2) { ?> value="<?php echo $_POST['name']; ?>" <?php } ?> required autofocus>
            </div>
            <div>
                <label for="email">Email : &nbsp;</label>
                <input type="email" placeholder="exemple@mail.com" name="email" <?php if ($error === 2) { ?> value="<?php echo $_POST['email']; ?>" <?php } ?> required>
            </div>
            <div>
                <label for="password">Mot de passe : &nbsp;</label>
                <input type="password" placeholder="*******" name="password" required>
            </div>
            <div>
                <label for="confpassword">Confirmer le mot de passe : &nbsp;</label>
                <input type="password" placeholder="*******" name="confpassword" required>
            </div>

            <p><button type="submit">S'inscrire</button></p>
            <p>Déjà inscrit ? <a href="?p=login">Cliquez ici !</a></p>
        </form>
    </div>
<?php } ?>

<script type="text/javascript">
    function validateForm() {
        if (document.forms["Inscription"]["confpassword"].value != document.forms["Inscription"]["password"].value)
        {
            document.getElementById('pas-bien').classList.remove("hidden");
            return false;
        }
    }
</script>