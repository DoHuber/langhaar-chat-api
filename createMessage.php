<?php
/**
 * Created by PhpStorm.
 * User: elcpt
 * Date: 21.12.16
 * Time: 20:24
 */


require "extra.php";
require "MessageMapper.php";

$token = $_POST["token"];
if(!isAuthTokenValid($token)) {
    reply(403);
    die();
}

$authorid = $_POST["id"];
$inhalt = $_POST["content"];
$title = $_POST["title"];


$toSave = new Message();
$toSave->author_id = $authorid;
$toSave->body = $inhalt;
$toSave->title = $title;

$messageMapper = new MessageMapper();
$messageMapper->createMessage($toSave);