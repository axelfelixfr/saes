<?php

class Database
{
    public static function connect()
    {
        // Cambiar usuario y contraseña
        $user = "administrador";
        $password = "administrador";

        $db = new mysqli('localhost', $user, $password, 'saes');
        $db->query("SET NAMES 'utf-8'");

        return $db;
    }
}
