<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */

if (isset($_POST["ban"])) {

    $ban = $_POST["ban"];
    ban($ban);
    
}

if (isset($_POST["unban"])) {

    $unban = $_POST["unban"];
    unban($unban);
    
}