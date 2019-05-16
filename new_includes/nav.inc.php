<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="index.php?page=Index"><img src="./image/logoCfpt.png" alt="logo" style="width:120px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="bg-dark collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="fontSize nav-link" href="index.php?page=Index">Index</a>
            </li>
            <?php if (isset($_SESSION["Connected"]) && $_SESSION["is_admin"] == 2) { ?>
                <li class="nav-item">
                    <a class="fontSize nav-link" href="index.php?page=MesArticles">Mes articles</a>
                </li>
            <?php } if (isset($_SESSION["Connected"]) && $_SESSION["is_admin"] == 1) { ?>
                <li class="nav-item">
                    <a class="fontSize nav-link" href="index.php?page=MesArticles">Mes articles</a>
                </li>
            <?php } if (!isset($_SESSION["Connected"])) { ?>
                <li class="nav-item">            
                    <a class="fontSize nav-link" href="index.php?page=Inscription">Inscription</a>
                </li>
            <?php } if (!isset($_SESSION["Connected"])) { ?>
                <li class="nav-item">             
                    <a class="fontSize nav-link" href="index.php?page=Login">Login</a>
                </li>
            <?php } if (isset($_SESSION["Connected"])) { ?>   

                <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <span class="fontSize user-name"><?= $_SESSION["pseudo"]; ?></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="navbar-content">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="./image/avatar_default.png" alt="Alternate Text" class="img-responsive" width="100px" height="100px"/>
                                </div>
                                <div class="col-md-7">
                                    <span class="fontSize"><?= $_SESSION["pseudo"]; ?></span>
                                    <p class="text-muted small"><?= $_SESSION["email"]; ?></p>
                                    <hr id="espacement">
                                    <a href="index.php?page=privateProfile"><i class="fa fa-user-o" aria-hidden="true"></i> Profil</a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-footer">
                            <div class="navbar-footer-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="index.php?page=deco" class="btn btn-default btn-sm pull-right"><i class="fa fa-power-off" aria-hidden="true"></i>Se déconnecter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>    
            <?php } ?>
        </ul>
    </div>
</nav>