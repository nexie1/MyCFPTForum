<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
//Quand une personne arrive sur le site je lui met un pseudo par défaut qui est inconnu
if (isset($_SESSION["pseudo"]) == "") {
    $_SESSION["pseudo"] = "inconnu";
}
?>
<article>
    <div class="insideArt row content">
        <div class="col-sm-9">
            </br>
            <h4><?= $value["title"] ?></h4>
            <p class="bordure"> Publié par <a href="index.php?page=publicProfile&pseudoProfile=<?= $value["pseudo"] ?>"><?= $value["pseudo"] ?></a>, <?= $value["creation_date"] ?>.</p>
            <p><?= $value["content"] ?></p> 

            <?php if ($is_admin == 2 || $_SESSION["pseudo"] == $value["pseudo"]) {
                ?>    
                <a href="index.php?page=ModifArticles&idModifMyArticle=<?= $value["id_article"] ?>"><input type="button" class="btn-info" name="ModifMyArticles" value="Modifier votre article"></a>
                <a href="index.php?page=DeleteArticle&DeleteArticleById=<?= $value["id_article"] ?>"><input class="btn-danger" type="submit" name="DelMyArticles" value="Supprimer votre article"></a>

            <?php } ?>      
            <?php if (isset($_SESSION["Connected"])) { ?>
                <em><a href="./index.php?page=afficheArticleById&idArt=<?= $value["id_article"] ?>">Commentaires</a></em>    
            <?php } ?>
        </div>
    </div>
</article>



