<?php
namespace App\Model\Admin;

use \PDO;

class Login
{
    private $_db;

	public static function checkLogin()
	{
        $username = $_POST['username'];
        $password = $_POST['pass'];

        $bdd = new PDO('mysql:dbname=projet_blog;host=localhost', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare("
                            SELECT * 
                            FROM users 
                            WHERE username = :username AND password = :password
                            ");
        $req->execute(array('username' => $username, 'password' => $password));

        $user = $req->fetch();

        return $user;
	}

    public function logged()
    {
        return isset($_SESSION['auth']);
    }
}
?>