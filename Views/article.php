<?php
$article = infosArticle($_GET['id']);
$user = infosUser($article['id_user']);
$comments = listComments($article['id']);
?>

<h1 class="page-title"><?php echo $article['title']; ?></h1>

<div id="article-container">
    <p><?php echo $article['description']; ?></p>

    <div class="article-user">
        <a href="?p=user&id=<?php echo $user['id']; ?>" title="Voir le profil"><?php echo $user['name']; ?></a>
    </div>
</div>
<br>
<div id="comments-container">
    <h3>Commentaires :</h3>
    <?php
    foreach($comments as $comment) {
        $comment_user = infosUser($comment['id_user']);
        ?>
        <hr>
        <div class="comment">
            <div>
                <a href="?p=user&id=<?php echo $comment_user['id']; ?>" title="Voir le profil"><?php echo $comment_user['name']; ?></a>
            </div>
            <div><?php echo $comment['content']; ?></div>
        </div>
        <?php
    }
    ?>
</div>
