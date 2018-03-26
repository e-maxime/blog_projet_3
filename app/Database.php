<?php
namespace App;
use \PDO;

class Database
{
    private $_dbname;
    private $_dbuser;
    private $_dbpass;
    private $_dbhost;
    private $_db;
    
    public function __construct($db_name, $db_user, $db_pass, $db_host)
    {
        $this->_dbname = $db_name;
        $this->_dbuser = $db_user;
        $this->_dbpass = $db_pass;
        $this->_dbhost = $db_host;
    }
    
    private function getDb()
    {
        if($this->_db === null)
        {
            $db = new PDO('mysql:dbname=projet_blog;host=localhost', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $this->_db = $db;
        }
        return $this->_db;
    }
    
    public function query($statement, $class_name = null, $only_one = false)
    {
        $req = $this->getDb()->query($statement);
        
        if($class_name === null)
        {
            $req->setFetchMode(PDO::FETCH_OBJ);
        }
        
        else
        {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        
        if($only_one)
        {
            $data = $req->fetch();
        }
        else
        {
            $data = $req->fetchAll();   
        }
        return $data;
    }
    
    public function prepare($statement, $attributes, $class_name = null, $only_one = false)
    {
        $req = $this->getDb()->prepare($statement);
        $req->execute($attributes);
        
        if($class_name === null)
        {
            $req->setFetchMode(PDO::FETCH_OBJ);
        }
        
        else
        {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }

        if($only_one)
        {
            $data = $req->fetch();
        }
        else
        {
            $data = $req->fetchAll();   
        }
        return $data;
    }

    public function insert($statement, $attributes)
    {
        $req = $this->getDb()->prepare($statement);
        $req->execute($attributes);

        if($req === false)
        {
            throw new Exception('Impossible d\'ajouter l\'élément. Veuillez réessayer.');
        }
        else 
        {
            //header('Location: ');
        }
    }

    public function counter($statement, $attributes=null)
    {
        if($attributes === null)
        {
            $req = $this->getDb()->query($statement);
            $data = $req->fetch();
            $nbThings = $data['nbThings'];
            return $nbThings;
        }
        elseif ($attributes) {
            $req = $this->getDb()->prepare($statement);
            $req->execute($attributes);
            $data = $req->fetch();
            $nbThings = $data['nbThings'];
            return $nbThings;
        }
        
    }

    public function simplePrepare($statement, $attributes)
    {
        $req = $this->getDb()->prepare($statement);
        $req->execute($attributes);
        
        $data = $req->fetch();
        return $data;
    }

    public function update($statement, $attributes)
    {
        $req = $this->getDb()->prepare($statement);
        $req->execute($attributes); 
    }

    public function delete($statement, $attributes)
    {
        $req = $this->getDb()->prepare($statement);
        $req->execute($attributes);
    }
}