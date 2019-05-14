<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */

//$PSEUDO = "pseudo";
$LAST_NAME = "last_name";
$FIRST_NAME = "first_name";
$EMAIL = "email";
$PASSWORD = "password";

//Filtre les entrées des formulaires du site pour eviter l'injection
//$info[$PSEUDO] = (isset($_POST[$PSEUDO]) ? filter_var($_POST[$PSEUDO], FILTER_SANITIZE_STRING) : "");
$info[$LAST_NAME] = (isset($_POST[$LAST_NAME]) ? filter_var($_POST[$LAST_NAME], FILTER_SANITIZE_STRING) : "");
$info[$FIRST_NAME] = (isset($_POST[$FIRST_NAME]) ? filter_var($_POST[$FIRST_NAME], FILTER_SANITIZE_STRING) : "");
$info[$EMAIL] = (isset($_POST[$EMAIL]) ? filter_var($_POST[$EMAIL], FILTER_SANITIZE_STRING) : "");
$info[$PASSWORD] = (isset($_POST[$PASSWORD]) ? hash("sha1", filter_var($_POST[$PASSWORD], FILTER_SANITIZE_STRING)) : "");

$TITRE_ART = "title";
$CONTENU_ART = "content";
$STATUT_ART = "is_active";
$DATE_ART = "creation_date";

$article[$TITRE_ART] = (isset($_POST[$TITRE_ART]) ? filter_var($_POST[$TITRE_ART], FILTER_SANITIZE_STRING) : "");
$article[$CONTENU_ART] = (isset($_POST[$CONTENU_ART]) ? filter_var($_POST[$CONTENU_ART], FILTER_SANITIZE_STRING) : "");
$article[$STATUT_ART] = (isset($_POST[$STATUT_ART]) ? filter_var($_POST[$STATUT_ART], FILTER_VALIDATE_INT) : "");
$article[$DATE_ART] = date('Y-m-d');
