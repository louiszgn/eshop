<h1 class="page-title">Bienvenue sur BobShop !</h1>

<h2 class="page-title">Qu'est-ce que BobShop ?</h2>
<p class="index-description">BobShop est tout simplement un eshop de fans regroupant différents articles sur Bob l'éponge, son entourage et son univers.<br><span><strong>Bonne visite !</strong></span></p>

<h3>Liste des derniers articles :</h3>
<?php
$data = listArticles();
require_once('affichage_articles.php');
?>