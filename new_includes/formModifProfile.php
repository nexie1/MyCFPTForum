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
    <article>
        <?php foreach ($displayPrivateProfileById as $value) { ?>   
            <div class="insideArt container bootstrap snippet">
                <div class="row">
                    <div class="col-sm-10"><h1><?= $value["pseudo"] ?></h1></div>
                </div>
                <div class="row">
                    <div class="col-sm-3">

                        <div class="text-center">
                            <img src="./image/avatar_default.png" class="avatar img-circle img-thumbnail" alt="avatar"width="150px" height="150px" >
                           <!-- <input type="file" class="text-center center-block file-upload">-->
                            <br>
                        </div>

                    </div><!--/col-3-->
                    <div class="col-sm-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <hr>
                                <form class="form" method="POST" action="#">
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <input type="hidden" class="form-control" name="id_profile" value="<?= $value["id_user"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="first_name_profile"><h4>First name</h4></label>
                                            <input type="text" class="form-control" name="first_name_profile" value="<?= $value["first_name"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="last_name_profile"><h4>Last name</h4></label>
                                            <input type="text" class="form-control" name="last_name_profile" value="<?= $value["last_name"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="email_profile"><h4>Email</h4></label>
                                            <input type="email" class="form-control" name="email_profile" value="<?= $value["email"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <br>
                                            <button class="btn btn-lg btn-success" type="submit" name="ValidModifProfile"><i class="glyphicon glyphicon-ok-sign"></i> Sauvegarder</button>
                                            <a href="index.php?page=privateProfile"><i class="fa fa-user fa-lg"></i> Retour</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>  
    </article>
</section>