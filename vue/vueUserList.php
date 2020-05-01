<?php $this->title = 'List des membres - Catchup Blog' ?>

<!-- Compteur tableau -->
<?php $i=1 ?>

<div class="row">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Login</th>
                <th scope="col">Mail</th>
                <th scope="col">Rôle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <th scope="row"><?php echo $i; $i++ ?></th>
                <td><?= $user['user_firstname']?></td>
                <td><?= $user['user_lastname']?></td>
                <td><?= $user['user_login']?></td>
                <td><?= $user['user_mail']?></td>
                <td>
                    <form id="usertype" action="" method="POST">
                        <select name="usertype" id="usertype" form="usertype">
                            <option value=""><?= $user['usertype_name']?></option>
                            <?php foreach($usertypes as $usertype): ?>
                            <option value=""><?= $usertype['usertype_name']?></option>
                            <?php endforeach ?>                            
                        </select>
                        <button class="type-badge">Modifier</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>