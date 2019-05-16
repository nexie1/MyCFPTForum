<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */

//Lors de l'appui sur le bouton ajouter commentaire
if (isset($_POST["SubCommentaire"])) {
    //Verifie si commentaire n'es pas vide
    if ($_POST["commentaire"] != "") {
        //ajoute la date précise de l'instant où on a cliquer sur le bouton
        $date = date("Y-m-d H:i:s");
        //prend l'id de l'article
        $info["id_article"] = $_GET['idArt'];
        //prend le contenu du commentaire
        $info["content"] = $_POST["commentaire"];
        //met la date dans mon tableau
        $info["creation_date"] = $date;
        //Ajoute mon commentaire
        addCom($info);
        //redirige sur la page où l'on voit l'article + les commentaires
        header('Location: ./index.php?page=afficheArticleById&idArt=' . $info["id_article"]);
    } else {
        
        //Si le commentaire est vide une alerte est émise 
        echo 'Votre titre ou contenu est vide';
    }
}

