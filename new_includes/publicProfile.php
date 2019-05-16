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
        <?php foreach ($displayPublicProfile as $value) { ?>   
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
                                        <div class="col-md-4 col-sm-3 col-xs-3 profile-header-section1 pull-left">
                                            <h1><?= $value["pseudo"]; ?></h1>
                                        </div>
                                        <?php if ($is_admin == 2) { ?>
                                            <?php if ($value['is_active'] == 0): ?>
                                                <form method="POST" action="#">
                                                    <div class="col-md-4 col-sm-3 col-xs-3 profile-header-section1 pull-left">
                                                        <button type="submit"  name="unban" value="<?= $value["id_user"] ?>" class="btn btn-warning btn-xs">Débannir</button>
                                                    </div>
                                                </form>
                                            <?php else: ?>
                                                <form method="POST" action="#">
                                                    <div class="col-md-4 col-sm-3 col-xs-3 profile-header-section1 pull-left">
                                                        <button type="submit" name="ban" value="<?= $value["id_user"] ?>" class="btn btn-warning btn-xs">Bannir</button>
                                                    </div>
                                                </form>
                                            <?php endif; ?>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
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