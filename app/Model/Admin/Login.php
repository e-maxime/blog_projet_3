<?php
namespace App\Model\Admin;

use \App\App;

class Login
{
	public static function checkLogin()
	{
        return App::getDb()->simplePrepare("SELECT * FROM users WHERE username = ? AND password = ? ", array($_POST['username'], $_POST['pass']));
	}

    public function logged()
    {
        return isset($_SESSION['auth']);
    }
}
?>