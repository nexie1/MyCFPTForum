<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
?>
<?php
$is_admin = 0;
if (isset($_SESSION["is_admin"])) {
    $is_admin = $_SESSION["is_admin"];
}
?>

<nav class="nav-side-menu bg-dark text-white">
    <div class="text-white bg-dark brand">
        <?php if (isset($_SESSION["Connected"])) { ?>
            <p style="color:green;">Connecté : <strong> <?= $_SESSION["pseudo"] ?></strong></p>
        <?php } ?>
    </div>

    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

    <div class="menu-list"> 
        <ul id="menu-content" class="menu-content collapse out">
            <?php
            if (isset($_SESSION["Connected"])) {
                $tableTopic = getTopics();
                foreach ($tableTopic as $value) {
                    ?> 
            <li><a class="fontSize" href="index.php?page=<?= $value["title"] ?>&id_topic=<?= $value["id_topic"] ?>"><?= $value["title"] ?></a></li> 
                    <?php
                    $topicId = $value["id_topic"];
                }
                ?>                 
                <br><br><br>

                <form method="POST" action="#"><li><a class="fontSize" href="index.php?page=deco"><i class="fa fa-user fa-lg"></i> Se déconnecter</a></li></form>
                <?php
            } ?>
        </ul>
    </div>
</nav>

