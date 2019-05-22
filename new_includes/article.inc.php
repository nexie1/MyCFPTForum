<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
?>
<section>
    <?php
    if (isset($_SESSION["Connected"]) && $page == "MesArticles") {
        $tableArticlesUser = getArticlesUser($_SESSION["id_user"]);

        //affiche les articles qu'on a fait
        foreach ($tableArticlesUser as $value) {
            include '/new_includes/mesArticles.php';
        }
    }
    if ($page == "Index") {////Quand on est sur la page index on prend les articles public
        $tableArticlesPublic = getArticlesPublic();

        //affiche les articles publics
        foreach ($tableArticlesPublic as $value) {
            include '/new_includes/articlesPublic.php';
        }
    }
    ?>
</section>