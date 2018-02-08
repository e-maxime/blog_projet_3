<?php
namespace Core\Auth;

use \App;

class DbAuth
{
    private $_db;
    
    public function __construct()
    {
        $this->_db = \App\App::getDb();
    }
    
    public function login($username, $password)
    {
        $user = $this->_db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
        var_dump($user);
    }
    
    //Vérif si l'utilisateur est déjà présent dans la session
    public function logged()
    {
        return isset($_SESSION['auth']);
    }
    
}