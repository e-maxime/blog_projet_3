<?php
    require('../core/Auth/DbAuth.php');
    require('../app/App.php');
    require('../app/Database.php');

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 'home';
    }

    $auth = new \Core\Auth\DbAuth(\App\App::getDb());

    if(!$auth->logged())
    {
        $forbidden = new \App\App();
        $forbidden->forbidden();
    }

    if($page === 'home')
    {
       require('../app/Views/admin/posts/index.php');
    }
    elseif($page === 'login')
    {
        require('../app/Views/users/login.php');
    }
    elseif($page === '404')
    {
        echo '<p>Aucun article n\'a été trouvé. </p><a href="index.php">Retourner à l\'accueil</a>';
    }

?>