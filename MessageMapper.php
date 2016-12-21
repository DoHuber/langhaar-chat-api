<?php

/**
 * Created by PhpStorm.
 * User: elcpt
 * Date: 04.12.16
 * Time: 02:30
 */
require "Mapper.php";
require "Message.php";


class MessageMapper extends Mapper
{

    function createMessage(Message $message) {

        $statement =
            $this->pdo->prepare(
                "INSERT INTO message(title, body, created_time, author_id) VALUES"
                ." (:title, :body, :created, :author)");

        $theTime = date("Y-m-d H:i:s");

        $statement->bindParam(":title", $message->title);
        $statement->bindParam(":body", $message->body);
        $statement->bindParam(":created", $theTime);
        $statement->bindParam(":author", $message->author_id);
            
        $statement->execute();
        
    }

    function getLastTwenty() {

        $statement = $this->pdo->query("SELECT * FROM message ORDER BY created_time DESC LIMIT 20");
        $statement->setFetchMode(PDO::FETCH_CLASS, "Message");
        $statement->execute();

        return $statement->fetchAll();

    }

    function getAllSince($timeStamp) {

        $statement = $this->pdo->prepare("SELECT * FROM message WHERE created_time > :ts ORDER BY created_time DESC");
        $statement->bindParam(":ts", $timeStamp);
        $statement->setFetchMode(PDO::FETCH_CLASS, "Message");
        $statement->execute();

        return $statement->fetchAll();

    }





}