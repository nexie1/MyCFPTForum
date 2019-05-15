<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */

//détruit la session
session_destroy();
//redirige sur l'index
header("Location: index.php?page=Index");
?>
