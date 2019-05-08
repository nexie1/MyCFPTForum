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
