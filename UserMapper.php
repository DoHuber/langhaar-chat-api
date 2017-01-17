<?php

/**
 * Created by PhpStorm.
 * User: elcpt
 * Date: 04.12.16
 * Time: 02:01
 */
require "Mapper.php";

class UserMapper extends Mapper
{
    function create(User $u) {

        $statement =
            $this->pdo->prepare(
                "INSERT INTO user(first_name, last_name, email, user_password, pin) VALUES "
                . "(:firstn, :lastn, :email, :userp, :passp)");

        $statement->bindParam(":firstn", $u->first_name);
        $statement->bindParam(":lastn", $u->last_name);
        $statement->bindParam(":email", $u->email);
        $statement->bindParam(":userp", $u->user_password);
        $statement->bindParam(":passp", $u->passphrase);

        $statement->execute();

    }

    function findById($id) {

        $statement = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
        $statement->bindParam("id", $id);

        $statement->setFetchMode(PDO::FETCH_CLASS, "User");
        $statement->execute();

        return $statement->fetch();

    }

    function findAllUsers() {

        $statement = $this->pdo->query("SELECT * FROM user");
        $statement->setFetchMode(PDO::FETCH_CLASS, "User");
        $statement->execute();

        return $statement->fetchAll();

    }

    function updateUser(User $u) {

        $statement =
            $this->pdo->prepare(
                "UPDATE user SET first_name = :firstn, last_name = :lastn, email = :email,"
                ."user_password = :userp, passphrase = :passp WHERE id = :id"
            );

        $statement->bindParam(":firstn", $u->first_name);
        $statement->bindParam(":lastn", $u->last_name);
        $statement->bindParam(":email", $u->email);
        $statement->bindParam(":userp", $u->user_password);
        $statement->bindParam(":passp", $u->passphrase);
        $statement->bindParam(":id", $u->id);

        $statement->execute();

    }

    function deleteUser(User $user) {

        $statement = $this->pdo->prepare("DELETE FROM user WHERE id = :id");
        $statement->bindParam(":id", $user->id);
        $statement->execute();

    }




}