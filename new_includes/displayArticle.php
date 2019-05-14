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
                    <p class="bordure"><span class="glyphicon glyphicon-time"></span> Publié par <?= $value["pseudo"] ?>, <?= $value["creation_date"] ?>.</p>
                    <p><?= $value["content"] ?></p>      
                    <?php
                }
                ?>                                        
            </div>
        </div>
    </article>

    <?php foreach ($resultCom as $value1) { ?>
        <article>
            <div class=" insideArt row content">
                <div class="col-sm-9">
                    </br>
                    <p class="bordure"><span class="glyphicon glyphicon-time"></span> Commentaire publié par <?= $value1["pseudo"] ?>, <?= $value1["creation_date"] ?>.</p>
                    <p><?= $value1["content"] ?></p>      
                </div>
            </div>
        </article>
    <?php } ?>

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
</section>