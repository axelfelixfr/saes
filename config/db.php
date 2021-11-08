<?php

class Database
{
    public static function connect()
    {
        $db = new mysqli('localhost', 'administrador', 'administrador', 'saes');
        $db->query("SET NAMES 'utf-8'");

        return $db;
    }
}
