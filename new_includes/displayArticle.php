<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
?>
<section id="maSection">      
    <article>
        <div class=" insideArt row content">
            <div class="col-sm-9">
                </br>
                <?php foreach ($resultArt as $value) { ?>
                    <h4>Titre : <?= $value["title"] ?></h4>
                    <p class="bordure"> Publié par <a href="index.php?page=publicProfile&pseudoProfile=<?= $value["pseudo"] ?>"><?= $value["pseudo"] ?></a>, <?= $value["creation_date"] ?>.</p>
                    <p><?= $value["content"] ?></p>      
                    <?php
                }
                ?>  

                <?php if ($is_admin == 2 || $_SESSION["pseudo"] == $value["pseudo"]) { ?>
                    <a href="index.php?page=ModifArticles&idModifMyArticle=<?= $value["id_article"] ?>"><input type="button" class="btn-info" name="ModifMyArticles" value="Modifier votre article"></a>
                    <a href="index.php?page=DeleteArticle&DeleteArticleById=<?= $value["id_article"] ?>"><input class="btn-danger" type="submit" name="DelMyArticles" value="Supprimer votre article"></a>          
                <?php } ?>   

            </div>
        </div>
    </article>

    <?php foreach ($resultCom as $value1) { ?>
        <article>
            <div class=" insideArt row content">
                <div class="col-sm-9">
                    </br>
                    <p class="bordure"> Publié par <a href="index.php?page=publicProfile&pseudoProfile=<?= $value1["pseudo"] ?>"><?= $value1["pseudo"] ?></a>, <?= $value1["creation_date"] ?>.</p>
                    <p><?= $value1["content"] ?></p>     

                    <?php if ($is_admin == 2 || $_SESSION["pseudo"] == $value1["pseudo"]) { ?>
                        <a href="index.php?page=ModifComments&OldIdArt=<?= $_GET["idArt"] ?>&idModifComments=<?= $value1["id_comment"] ?>"><input type="button" class="btn-info" name="ModifMyComments" value="Modifier commentaire"></a>
                        <a href="index.php?page=DeleteComments&OldIdArt=<?= $_GET["idArt"] ?>&DeleteCommentsId=<?= $value1["id_comment"] ?>"><input class="btn-danger" type="submit" name="DelMyComments" value="Supprimer commentaire"></a>          
                    <?php } ?>  
                </div>
            </div>
        </article>
        <?php
    }

    if (isset($_SESSION["Connected"]) && $is_active == 1) {
        ?>
        <article>
            <div class=" insideArt row content">
                <div class="col-sm-9">
                    <br>
                    <?php
                    include_once 'formCommentaire.inc.php';
                    ?>   
                </div>
            </div>
        </article>
    <?php } ?>
</section>