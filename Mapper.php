<?php

/**
 * Created by PhpStorm.
 * User: elcpt
 * Date: 04.12.16
 * Time: 01:59
 */
class Mapper
{
    protected $pdo;

    function __construct()
    {

        $this->pdo = DBConnection::getConnection();

    }


}