<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */

//Filtre les entrées des formulaires du site pour eviter l'injection
$PSEUDO = "pseudo";
$LAST_NAME = "last_name";
$FIRST_NAME = "first_name";
$EMAIL = "email";
$PASSWORD = "password";


$info[$PSEUDO] = (isset($_POST[$PSEUDO]) ? filter_var($_POST[$PSEUDO], FILTER_SANITIZE_STRING) : "");
$info[$LAST_NAME] = (isset($_POST[$LAST_NAME]) ? filter_var($_POST[$LAST_NAME], FILTER_SANITIZE_STRING) : "");
$info[$FIRST_NAME] = (isset($_POST[$FIRST_NAME]) ? filter_var($_POST[$FIRST_NAME], FILTER_SANITIZE_STRING) : "");
$info[$EMAIL] = (isset($_POST[$EMAIL]) ? filter_var($_POST[$EMAIL], FILTER_SANITIZE_STRING) : "");
$info[$PASSWORD] = (isset($_POST[$PASSWORD]) ? hash("sha1", filter_var($_POST[$PASSWORD], FILTER_SANITIZE_STRING)) : "");

//Articles

$TITRE_ART = "title";
$CONTENU_ART = "content";
$STATUT_ART = "is_active";
$DATE_ART = "creation_date";

$article[$TITRE_ART] = (isset($_POST[$TITRE_ART]) ? filter_var($_POST[$TITRE_ART], FILTER_SANITIZE_STRING) : "");
$article[$CONTENU_ART] = (isset($_POST[$CONTENU_ART]) ? filter_var($_POST[$CONTENU_ART], FILTER_SANITIZE_STRING) : "");
$article[$STATUT_ART] = (isset($_POST[$STATUT_ART]) ? filter_var($_POST[$STATUT_ART], FILTER_VALIDATE_INT) : "");
$article[$DATE_ART] = date('Y-m-d');

$id_ModifArticles = "idModifArticles";
$titre_ModifArticles = "titreModifArticles";
$contenu_ModifArticles = "contenuModifArticles";

$infoModifArticles[$id_ModifArticles] = (isset($_POST[$id_ModifArticles]) ? filter_input(INPUT_POST, $id_ModifArticles, FILTER_SANITIZE_STRING) : "");
$infoModifArticles[$titre_ModifArticles] = (isset($_POST[$titre_ModifArticles]) ? filter_input(INPUT_POST, $titre_ModifArticles, FILTER_SANITIZE_STRING) : "");
$infoModifArticles[$contenu_ModifArticles] = (isset($_POST[$contenu_ModifArticles]) ? filter_input(INPUT_POST, $contenu_ModifArticles, FILTER_SANITIZE_STRING) : "");

//Comments
$CONTENU_COM = "content";
$DATE_COM = "creation_date";

$comment[$CONTENU_COM] = (isset($_POST[$CONTENU_COM]) ? filter_var($_POST[$CONTENU_COM], FILTER_SANITIZE_STRING) : "");
$comment[$DATE_COM] = date('Y-m-d');

$id_ModifComments = "idModifComments";
$contenu_ModifComments = "contenuModifComments";

$infoModifComments[$id_ModifComments] = (isset($_POST[$id_ModifComments]) ? filter_input(INPUT_POST, $id_ModifComments, FILTER_SANITIZE_STRING) : "");
$infoModifComments[$contenu_ModifComments] = (isset($_POST[$contenu_ModifComments]) ? filter_input(INPUT_POST, $contenu_ModifComments, FILTER_SANITIZE_STRING) : "");
