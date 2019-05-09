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
    <a class="navbar-brand" href="index.php?page=Index"><img src="./image/logoCfpt.png" alt="logo" style="width:40px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="bg-dark collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="fontSize nav-link" href="index.php?page=Index">Index</a>
            </li>
            <li class="nav-item">
                <?php if (isset($_SESSION["Connected"]) && $_SESSION["is_admin"] == 2) { ?>
                    <a class="fontSize nav-link" href="index.php?page=MesArticles">Mes articles</a>
                    <?php
                }
                ?>
            </li>
            <li class="nav-item">
                <?php if (isset($_SESSION["Connected"]) && $_SESSION["is_admin"] == 1) { ?>
                    <a class="fontSize nav-link" href="index.php?page=MesArticles">Mes articles</a>
                    <?php
                }
                ?>
            </li>
            <li class="nav-item">            
                <?php if (!isset($_SESSION["Connected"])) { ?>
                    <a class="fontSize nav-link" href="index.php?page=Inscription">Inscription</a>
                    <?php
                }
                ?>
            </li>
            <li class="nav-item">             
                <?php if (!isset($_SESSION["Connected"])) { ?>
                    <a class="fontSize nav-link" href="index.php?page=Login">Login</a>
                    <?php
                }
                ?>
            </li>
        </ul>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                    <img src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" class="img-responsive img-circle" title="John Doe" alt="John Doe" width="30px" height="30px">
                </span>
                <span class="user-name">
                    John Doe
                </span>
                <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <div class="navbar-content">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" alt="Alternate Text" class="img-responsive" width="120px" height="120px" />
                                <p class="text-center small">
                                    <a href="./3X6zm">Change Photo</a></p>
                            </div>
                            <div class="col-md-7">
                                <span>John Doe</span>
                                <p class="text-muted small">
                                    example@pods.tld</p>
                                <div class="divider">
                                </div>
                                <a href="./56ExR" class="btn btn-default btn-xs"><i class="fa fa-user-o" aria-hidden="true"></i> Profile</a>
                                <a href="#" class="btn btn-default btn-xs"><i class="fa fa-address-card-o" aria-hidden="true"></i> Contacts</a>
                                <a href="#" class="btn btn-default btn-xs"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a>
                                <a href="#" class="btn btn-default btn-xs"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Help!</a>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-footer">
                        <div class="navbar-footer-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-default btn-sm"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Passowrd</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-default btn-sm pull-right"><i class="fa fa-power-off" aria-hidden="true"></i> Sign Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</nav>

