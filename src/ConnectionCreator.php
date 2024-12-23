<?php
namespace ScreenMatch;

use PDO;
Class ConnectionCreator{

    
    public static function createConnection(): PDO
    {
        $pdo = new PDO('mysql:host=localhost;dbname=screenmatch', 'root', 'password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
        return $pdo;
    }
}