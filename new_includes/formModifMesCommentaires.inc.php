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
    <?php
    foreach ($tableCommentsUser as $value) {
        ?>
        <article>
            <form method="POST" action="#">
                <table>
                    <tr>
                        <td>Contenu</td>
                        <td><textarea style="width: 300px; height: 300px;" name="contenuModifComments" placeholder="Contenu du commentaire"><?= $value["content"] ?></textarea></td>
                    </tr>
                    <tr>
                        <td>idCom</td>
                        <td><input readonly="" name="idModifComments" type="text" placeholder=" id de l'article" value="<?= $id_comment ?>"></td>
                    </tr>                    
                    <tr>
                        <td><input type="submit" name="ValidModifComment" value="Valider"></td>
                    </tr>
                </table>
            </form>
        </article>
        <?php
    }
    ?>
</section>  