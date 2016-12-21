<?php
/**
 * Created by PhpStorm.
 * User: elcpt
 * Date: 07.12.16
 * Time: 20:39
 */

$daten = array();
$echoWert = "";

foreach ($daten as $row) {
    $echoWert = $echoWert . $row["date"] . ",";
}

$echoWert = substr($echoWert, 0, count($echoWert) - 1);
echo $echoWert;

