<?php
namespace App;

class App
{
    private static $_database;
    private static $_titlePage = 'Jean Forteroche';
    
    const DB_NAME = 'projet_blog';
    const DB_USER = 'root';
    const DB_PASS = 'root';
    const DB_HOST = 'localhost';
    
    public static function getDb()
    {
        if(self::$_database === null)
        {
            self::$_database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }
        
        return self::$_database;
    }
    
    public static function getTitlePage()
    {
        return self::$_titlePage;
    }
    
    public static function setTitlePage($pageTitle)
    {
        self::$_titlePage = $pageTitle . ' | ' . self::$_titlePage;
    }

    public static function pageNotFound()
    {
        header("HTTP/1.0 404 Not Found");
        header('Page introuvable.');
    }
}