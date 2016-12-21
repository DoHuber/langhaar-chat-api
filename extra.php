<?php
/**
 * Created by PhpStorm.
 * User: elcpt
 * Date: 04.12.16
 * Time: 02:57
 */

function replyNotAuthorized() {

    header_remove();
    http_response_code(403);
    exit();

}

function replyOk() {

    header_remove();
    http_response_code(200);
    exit();

}

function reply($code) {

    header_remove();
    http_response_code($code);
    exit();

}

function isAuthTokenValid($token) {

    return ($token == getTokenFromDb());

}

function getTokenFromDb() {

    $pdo = DBConnection::getConnection();
    $stmt = $pdo->query("SELECT kv_value FROM keyvaluetext WHERE kv_key = 'token'");
    $stmt->execute();

    return $stmt->fetchColumn(0);

}

