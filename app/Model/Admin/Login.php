<?php
namespace App\Model\Admin;

use \App\App;
use \PDO;

class Login
{
	public static function checkLogin()
	{
		$bdd = new PDO('mysql:dbname=projet_blog;host=localhost', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
        $req = $bdd->prepare('SELECT * FROM users WHERE username = ? && password = ?');
        
        $req->execute(array(htmlspecialchars($_POST['username']), htmlspecialchars($_POST['pass'])));

       	$data = $req->fetchAll();

       	var_dump($data);
       	die();
        
        if ($req === false) 
        {
            ?>
            <div class="alert alert-danger">
            	<p>Identifiants incorrects.</p>
            </div>
            <?php
        }
        else 
        {
            header('Location: admin.php?page=admin.index');
        } 
	}
}
?>