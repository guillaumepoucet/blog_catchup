<?php $this->title = 'List des membres - Catchup Blog' ?>

<!-- Compteur tableau -->
<?php $i=1 ?>

<div class="row">

    <?php if(isset($_GET['statut']) && ($_GET['statut'] == 'deleteOk')):?>
    <div class="col-md-12 alert alert-danger alert-dismissible show" role="alert">
        <strong>Utilisateur supprimé.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif ?>

    <div class="col-md-12 alert alert-warning" role="alert">
        <p>Pour afficher les détails d'un utilisateur, veuillez le sélectionner.</p>
    </div>
    <div class="col-md-12 alert alert-warning" role="alert">
        <p>Pour modifer les droits d'un utilisateur, sélectionner un nouveau rôle dans le menu déroulant.</p>
    </div>
    <table id="userList" class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Login</th>
                <th scope="col">Mail</th>
                <th scope="col">Rôle</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody class="table-striped">
            <?php foreach($users as $user): ?>
            <tr>
                <th scope="row"><?php echo $i; $i++ ?></th>
                <td><?= $user['user_firstname']?></td>
                <td><?= $user['user_lastname']?></td>
                <td><?= $user['user_login']?></td>
                <td><?= $user['user_mail']?></td>
                <td>
                    <form id="usertype" action="index.php?action=admin&id=editRole" method="POST">
                        <input type="hidden" name="user_id" value="<?= $user_id = $user['user_id']?>">
                        <select name="usertype_id" id="usertype_id">
                            <option value="<?= $user['usertype_name']?>"><?= $user['usertype_name']?></option>
                            <?php foreach($usertypes as $usertype): ?>
                            <option value="<?= $usertype['usertype_id']?>"><?= $usertype['usertype_name']?></option>
                            <?php endforeach ?>
                        </select>
                        <button class="type-badge">Modifier</button>
                    </form>
                </td>
                <td>
                    <center><a href="index.php?action=admin&id=deleteUser<?=$user['user_id']?>"
                            class="type-badge delete-bg">Supprimer</a></center>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>