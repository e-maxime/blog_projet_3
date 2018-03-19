<?php
use App\Rooter;
\App\Helpers\Alert::getAlert();
?>
    <div class="col-md-6">
        <form method="POST" action="<?= Rooter::routeUrl('connection'); ?>">
                <div class="form-group">
                    <label>Nom d'utilisateur : </label>
                    <input id="username" name="username" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Mot de passe : </label>
                    <input id="pass" type="password" name="pass" class="form-control">
                </div>
                    <button class="btn btn-primary">Envoyer</button>
        </form>
    </div>




