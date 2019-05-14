<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
//Quand il est connecté il peut creer des commentaires sinon il est redirigé
/* if (!isset($_SESSION["Connected"])) {

  header('Location: index.php?page=Index');
  } */
?>
<h4>Laisse un commentaire</h4>
<form method="POST" role="form" action="#">
    <div class="form-group">
        <textarea name="commentaire" class="form-control" rows="3" required></textarea>
    </div>
    <button type="submit" name="SubCommentaire" class="btn btn-success">Submit</button>
</form> 