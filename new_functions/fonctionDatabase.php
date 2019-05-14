<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 08.05.2019
 * Copyright    : Fernandes Marco
 */

/**
 * Insert les utilisateurs dans la base de donnée
 * @param array $info tableau qui contient les données de l'utilisateur
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

//Login
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
/*function getUser($info) {
    try {
        $sql = "SELECT * FROM `users` WHERE pseudo = :pseudo";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':pseudo', $info["pseudo"]);
        $dbQuery->execute();
        return $dbQuery->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}*/

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
function addArticle($article,$id_topic) {
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
        $sql = "SELECT * FROM `articles` LEFT JOIN `users` ON `articles`.`id_user` = `users`.`id_user` LEFT JOIN `topics` ON `articles`.`id_topic` = `topics`.`id_topic` WHERE `topics`.`id_topic` = :idTopic";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':idTopic', $idTopic);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}