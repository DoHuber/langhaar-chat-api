<?php
/**
 * Created by PhpStorm.
 * User: elcpt
 * Date: 17.01.17
 * Time: 17:03
 */

include "DBConnection.php";
include "extra.php";

$result = isPinValid(4, "71");

if ($result) {
    echo "<br> Wurde für true befunden.";
} else {
    echo "<br> Wurde für false befunden";
}

print $result;