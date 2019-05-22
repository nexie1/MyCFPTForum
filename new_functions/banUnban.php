<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */

//s'il clique sur bannir alors
if (isset($_POST["ban"])) {

    //stocke l'utilisateur banni
    $ban = $_POST["ban"];
    ban($ban);
    
}
//s'il clique sur debannir alors
if (isset($_POST["unban"])) {

    //stocke l'utilisateur debanni
    $unban = $_POST["unban"];
    unban($unban);
    
}