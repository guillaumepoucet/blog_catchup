<?php $this->title = 'Modifier mes informations - Catchup Blog' ?>
<div class="row">

    <div class="col-md-10">

        <form class="register-form" action="index.php?action=signin" method="POST">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="firstname">Modifier votre prénom</label>
                    <input type="text" class="form-control" name="firstname" placeholder="<?=$user['user_firstname']?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="lastname">Modifier votre nom</label>
                    <input type="text" class="form-control" name="lastname" placeholder="<?=$user['user_lastname']?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="login">Modifier votre nom d'utilisateur</label>
                    <input type="text" class="form-control" name="login" placeholder="<?=$user['user_login']?>">
                </div>

                <div class="form-group col-md-6">
                    <label for="mail">Modifier votre adresse mail</label>
                    <input type="email" class="form-control" name="mail" aria-describedby="emailHelp" placeholder="<?=$user['user_mail']?>">
                    <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre adresse
                        mail.</small>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="pass">Modifiez votre mot de passe</label>
                    <input type="password" class="form-control" name="pass" placeholder="Mot de passe">
                </div>
                <div class="form-group col-md-6">
                    <label for="pass2">Confirmez votre mot de passe</label>
                    <input type="password" class="form-control" name="pass2" placeholder="Mot de passe">
                </div>
            </div>
            <div class="form-group">
                <label for="description">Ajoutez/Modifiez une description</label>
                <textarea class="form-control" name="description" rows="5"><?=$user['user_description']?></textarea>
            </div>
            <button type="submit" class="btn btn-primary pb-2">Soumettre</button>

        </form>

    </div>
</div>