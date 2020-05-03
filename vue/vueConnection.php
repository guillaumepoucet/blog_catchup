<?php $this->title = 'Connection - Catchup Blog' ?>

<!-- formulaire de connection -->
<div class="section-title">
    <h2>Connection à votre compte</h2>
</div>
<!-- row -->
<div class="row">

    <?php if(isset($_GET['id']) && ($_GET['id'] == 'signinOk')):?>
    <div class="col-md-12 alert alert-warning" role="alert">
        <p>Votre compte est bien enregistré, veuillez vous connecter !.</p>
    </div>
    <?php endif ?>


    <div class="login-page col-md-6">
        <div class="form">

            <form class="register-form" action="index.php?action=signin" method="POST">

                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control" name="firstname" placeholder="Prénom">
                </div>
                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Nom">
                </div>
                <div class="form-group">
                    <label for="login">Choisissez un nom d'utilisateur</label>
                    <input type="text" class="form-control" name="login" placeholder="Nom d'utilisateur">
                </div>

                <div class="form-group">
                    <label for="mail">Adresse Mail</label>
                    <input type="email" class="form-control" name="mail" aria-describedby="emailHelp"
                        placeholder="Entrez une adressse valide">
                    <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre adresse
                        mail.</small>
                </div>
                <div class="form-group">
                    <label for="pass">Mot de passe</label>
                    <input type="password" class="form-control" name="pass" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                    <label for="pass2">Confirmez votre mot de passe</label>
                    <input type="password" class="form-control" name="pass2" placeholder="Mot de passe">
                </div>
                <button type="submit" class="btn btn-primary pb-2">Créer mon compte</button>
                <p class="message">Vous avez déjà un compte ? <a href="#">Se connecter</a></p>

            </form>

            <form class="login-form" action="index.php?action=login" method="POST">

                <div class="form-group">
                    <label for="login">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="login" name="login"
                        placeholder="Votre nom d'utilisateur">
                </div>

                <div class="form-group">
                    <label for="pass">Mot de passe</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Votre mot de passe">
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
                </div>

                <button type="submit" class="btn btn-primary">Me connecter</button>

                <p class="message">Pas encore inscrit ? <a href="#">Créer un compte</a></p>

            </form>
        </div>
    </div>

</div>
<!-- /formulaire de connection -->