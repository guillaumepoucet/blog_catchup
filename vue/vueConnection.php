<?php $this->title = 'Connection - Catchup Blog' ?>

<!-- formulaire de connection -->
<div class="section-title">
    <h2>Connection à votre compte</h2>
</div>
<!-- row -->
<div class="row">

    <div class="login-page col-md-6">
        <div class="form">

            <form class="register-form" method="POST">
               
                    <div class="form-group">
                        <label for="firstname">Prénom</label>
                        <input type="text" class="form-control" id="firstname" placeholder="Prénom">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Nom</label>
                        <input type="text" class="form-control" id="lastname" placeholder="Nom">
                    </div>
               
                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse Mail</label>
                    <input type="email" class="form-control" id="mail" aria-describedby="emailHelp"
                        placeholder="Entrez une adressse valide">
                    <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre adresse mail.</small>
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" id="pass" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                    <label for="passConf">Confirmez votre mot de passe</label>
                    <input type="password" class="form-control" id="passConf" placeholder="Mot de passe">
                </div>
                <button type="submit" class="btn btn-primary pb-2">Créer mon compte</button>
                <p class="message">Vous avez déjà un compte ? <a href="#">Se connecter</a></p>
            
            </form>

            <form class="login-form" action="traitement.php" method="POST">

                <div class="form-group">
                    <label for="login">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="login" name="login" placeholder="Votre nom d'utilisateur">
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