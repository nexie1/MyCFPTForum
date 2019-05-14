<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
?>
<article>
    <div class="insideArt row content">
        <div class="col-sm-9">
            </br>
            <h4>Titre : <?= $value["title"] ?></h4>
            <p class="bordure"><span class="glyphicon glyphicon-time"></span> Publié par <?= $value["pseudo"] ?>, <?= $value["creation_date"] ?>.</p>
            <p><?= $value["content"] ?></p>          
            <em><a href="./index.php?page=afficheArticleById&idArt=<?= $value["id_article"] ?>">Commentaires</a></em>   
        </div>
    </div>
</article>