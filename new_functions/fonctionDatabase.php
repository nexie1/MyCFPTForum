<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */

/**
 * Insert les utilisateurs dans la base de donnée
 * @param array $info tableau qui contient les données de l'utilisateur dans la form inscriptions
 */
function addUser($info) {
    try {
        $sql = "INSERT INTO `users`(`pseudo`, `last_name`, `first_name`, `email`, `password`, `is_admin`, `is_active`) VALUES (:pseudo, :last_name, :first_name, :email, :password,1,1)";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':pseudo', $info["pseudo"]);
        $dbQuery->bindParam(':last_name', $info["last_name"]);
        $dbQuery->bindParam(':first_name', $info["first_name"]);
        $dbQuery->bindParam(':email', $info["email"]);
        $dbQuery->bindParam(':password', $info["password"]);
        $dbQuery->execute();
        return EDatabase::getInstance()->lastInsertId();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/**
 * Fonction de Login
 * @param array $info tableau qui contient les données entrées par l'utilisateur dans la form login
 */
function getUser($info) {
    try {
        $sql = "SELECT * FROM `users` WHERE email = :email";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':email', $info["email"]);
        $dbQuery->execute();
        return $dbQuery->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/**
 * Fonction qui récupère tout les topics de la base de données
 */
function getTopics() {
    try {
        $sql = "SELECT * FROM `topics`";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/**
 * Fonction qui récupère tous les récents articles (5max)
 */
function getArticlesPublic() {
    try {
        $sql = "SELECT * FROM `articles` LEFT JOIN `users` ON `articles`.`id_user` = `users`.`id_user` WHERE `articles`.`is_active` = 1 LIMIT 5";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/**
 * Fonction qui récupère tout les articles de l'utilisateur connécté
 * @param $idUtilisateur qui contient l'id de l'utilisateur pour pouvoir selectionner les articles le correspondant
 */
function getArticlesUser($idUtilisateur) {
    try {
        $sql = "SELECT * FROM `articles` LEFT JOIN `users` ON `articles`.`id_user` = `users`.`id_user` WHERE `users`.id_user = :id_user AND `articles`.`is_active` = 1";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_user', $idUtilisateur);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/**
 * Fonction qui permet d'afficher l'article selectionné
 * @param $idArt qui permet de récupérer l'id de l'article selectionné
 */
function selectArticleById($idArt) {
    try {
        $sql = "SELECT * FROM `articles` LEFT JOIN `users` ON `articles`.`id_user` = `users`.`id_user` WHERE id_article = :id_article AND `articles`.`is_active` = 1";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_article', $idArt);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/**
 * Fonction qui permet d'ajouter un commentaire
 * @param array $info tableau qui contient les données rentré par les utilisateurs
 */
function addCom($info) {

    $sql = "INSERT INTO `comments`(`id_comment`,`content`,`creation_date`,`id_user`,`id_article`) VALUES ('',:content,:creation_date,:id_user,:id_article)";
    $dbQuery = EDatabase::getInstance()->prepare($sql);

    $dbQuery->bindParam(':content', $info["content"]);
    $dbQuery->bindParam(':creation_date', $info["creation_date"]);
    $dbQuery->bindParam(':id_user', $info["id_user"]);
    $dbQuery->bindParam(':id_article', $info["id_article"]);
    $dbQuery->bindParam(':id_user', $_SESSION["id_user"]);
    $dbQuery->execute();
    return EDatabase::getInstance()->lastInsertId();
}

/**
 * Fonction qui permet de selectionné tout les commentaires par articles
 * @param $idArt tableau qui contient les données rentré par les utilisateurs
 */
function selectAllComByArticle($idArt) {
    try {
        $sql = "SELECT * FROM `comments` LEFT JOIN `users` ON `comments`.`id_user` = `users`.`id_user` WHERE id_article = :id_article";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_article', $idArt);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/**
 * Fonction qui permet d'ajouter des articles
 * @param array $article tableau qui contient les données rentré par l'utilisateurs
 * @param $id_topic permet de recuperer l'id du topic 
 */
function addArticle($article, $id_topic) {
    try {
        $sql = "INSERT INTO `articles`(`title`, `content`, `creation_date`,`id_topic`,`id_user`,`is_active`) VALUES (:title, :content, :creation_date,:id_topic,:id_user,1)";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':title', $article["title"]);
        $dbQuery->bindParam(':content', $article["content"]);
        $dbQuery->bindParam(':creation_date', $article["creation_date"]);
        $dbQuery->bindParam(':id_topic', $id_topic);
        $dbQuery->bindParam(':id_user', $_SESSION["id_user"]);
        $dbQuery->execute();
        return EDatabase::getInstance()->lastInsertId();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function selectAllArticleByTopics($idTopic) {
    try {
        $sql = 'SELECT * FROM `articles` LEFT JOIN `users` ON `articles`.`id_user` = `users`.`id_user` 
            LEFT JOIN `topics` ON `articles`.`id_topic` = `topics`.`id_topic` 
            WHERE `articles`.`is_active` = "1" 
            AND `topics`.`id_topic` = :idTopic';
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':idTopic', $idTopic);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function DeleteArticleById($idArt) {
    try {
        $sql = 'UPDATE `articles` SET`is_active`= "2" WHERE `id_article`= :id_article ';
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_article', $idArt);
        $dbQuery->execute();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getModifArticlesUserById($idArticles) {
    try {
        $sql = "SELECT * FROM `articles` WHERE id_article = :id_article";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_article', $idArticles);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function UpdateModifiedArticlesUserById($infoModifArticles) {

    try {
        $sql = 'UPDATE `articles` SET `title`= :title ,`content`= :content WHERE id_article = :id_article';
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_article', $infoModifArticles["idModifArticles"]);
        $dbQuery->bindParam(':title', $infoModifArticles["titreModifArticles"]);
        $dbQuery->bindParam(':content', $infoModifArticles["contenuModifArticles"]);
        $dbQuery->execute();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getModifCommentsUserById($idComments) {
    try {
        $sql = "SELECT * FROM `comments` WHERE id_comment = :id_comment";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_comment', $idComments);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function UpdateModifiedCommentsUserById($infoModifComments) {

    try {
        $sql = 'UPDATE `comments` SET `content`= :content WHERE id_comment = :id_comment';
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_comment', $infoModifComments["idModifComments"]);
        $dbQuery->bindParam(':content', $infoModifComments["contenuModifComments"]);
        $dbQuery->execute();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function DeleteCommentById($idCom) {
    try {
        $sql = 'DELETE FROM `comments` WHERE `id_comment`= :id_comment';
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_comment', $idCom);
        $dbQuery->execute();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function displayProfileById($id_user) {

    try {
        $sql = "SELECT * FROM `users` WHERE id_user = :id_user";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_user', $id_user);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function UpdateModifiedProfile($infoProfile) {

    try {
        $sql = 'UPDATE `users` SET `first_name`= :first_name_profile,`last_name`= :last_name_profile,`email`= :email_profile WHERE id_user = :id_profile';
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_profile', $infoProfile["id_profile"]);
        $dbQuery->bindParam(':first_name_profile', $infoProfile["first_name_profile"]);
        $dbQuery->bindParam(':last_name_profile', $infoProfile["last_name_profile"]);
        $dbQuery->bindParam(':email_profile', $infoProfile["email_profile"]);
        $dbQuery->execute();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function displayProfile($displayByPseudo) {

        try {
        $sql = "SELECT * FROM `users` WHERE pseudo = :pseudo";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':pseudo', $displayByPseudo);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
    
}
