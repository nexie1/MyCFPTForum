<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 08.05.2019
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
                <a class="nav-link" href="index.php?page=Index">Index</a>
            </li>      
            <li class="nav-item">            
                <?php /*if (!isset($_SESSION["Connected"])) {*/ ?>
                    <a class="nav-link" href="index.php?page=Inscription">Inscription</a>
                    <?php
               /* }*/
                ?>
            </li>
        </ul>
    </div>
</nav>

