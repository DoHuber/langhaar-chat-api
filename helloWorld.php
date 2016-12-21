<?php
/**
 * Created by PhpStorm.
 * User: elcpt
 * Date: 04.12.16
 * Time: 01:23
 */
require "extra.php";


echo "A random token: <br>";

$token = md5(uniqid("", true));

print $token;
