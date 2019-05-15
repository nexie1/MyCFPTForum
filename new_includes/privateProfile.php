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
        <?php foreach ($displayPrivateProfile as $value) { ?>   
            <div class="insideArt container main-secction">
                <div class="row">
                    <div class="row user-left-part">
                        <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                            <div class="row ">
                                <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                                    <img src="./image/avatar_default.png" class="avatar img-circle img-thumbnail" alt="avatar">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                            <div class="row profile-right-section-row">
                                <div class="col-md-12 profile-header">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                            <h1><?= $value["pseudo"]; ?></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade show active" id="profile">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Nom</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><?= $value["last_name"]; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Prenom</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><?= $value["first_name"]; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Email</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><?= $value["email"]; ?></p>
                                                        </div>
                                                    </div>
                                                    <?php if ($_SESSION["pseudo"] == $value["pseudo"] ) { ?>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <a href="index.php?page=modifProfile&idUserModif=<?= $value["id_user"]; ?>" class="btn btn-primary btn-block">Modifier</a>
                                                        </div>
                                                    </div>
                                                    <?php }  ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>  
    </article>
</section>