<?php
/**
 * Created by PhpStorm.
 * User: elcpt
 * Date: 04.12.16
 * Time: 02:57
 */

require "extra.php";
require "MessageMapper.php";

if (empty($_GET)) {

    reply(400);

}

$token = $_GET["token"];
if (!isAuthTokenValid($token)) {

    reply(403);

}

$type = $_GET["type"];
if ($type == "twenty") {

    $mMapper = new MessageMapper();
    $messages = $mMapper->getLastTwenty();

    $json = json_encode($messages);

    header_remove();
    header("Status: 200 OK");
    header("Content-Type: application/json");

    print_r($json);

    exit();

} elseif($type == "since") {

    $timeStamp = $_GET["timestamp"];
    $timeStamp = date("Y-m-d H:i:s", $timeStamp);

    $mMapper = new MessageMapper();
    $messages = $mMapper->getAllSince($timeStamp);

    $json = json_encode($messages);

    header_remove();
    header("Status: 200 OK");
    header("Content-Type: application/json");

    print_r($json);

    exit();

} else {

    reply(400);

}