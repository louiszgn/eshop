<div id="header">
    <a id="logo-header" href="/eshop"><img src="images/logo-<?php echo logo(); ?>.jpg"></a>
    <?php if (!isset($_SESSION['id'])) { ?>
        <a class="btn-log" href="?p=login" title="Log in">Login / Signin</a>
    <?php } else { ?>
        <a href="?p=create_article" title="Create an article">Create an article</a>
        <a class="btn-log" href="?p=logout" title="Log out">Logout</a>
    <?php } ?>
</div>