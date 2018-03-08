<section>
    <?php
    if(isset($_GET['msg']) && $_GET['msg'] == 1)
    {
    ?>
    <div class="alert alert-danger">
        Identifiants incorrects.
    </div>
    <?php
    }
    elseif(isset($_GET['msg']) && $_GET['msg'] == 2)
    {
        ?>
        <div class="alert alert-warning">
            Tous les champs ne sont remplis.
        </div>
        <?php
    }
    ?>
    <div style="width: 20%; margin-left: 4%; margin-bottom: 2%;">
        <form method="POST" action="connection">
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
</section>



