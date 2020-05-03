<?php $this->title = 'List des articles - Catchup Blog' ?>

<!-- Compteur tableau -->
<?php $i = 1 ?>

<div class="row">

    <?php if (isset($_GET['statut']) && ($_GET['statut'] == 'deleteOk')) : ?>
        <div class="col-md-12 alert alert-danger alert-dismissible show" role="alert">
            <strong>Article supprimé.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <div class="col-md-12 alert alert-warning" role="alert">
        <p>Pour afficher un article, cliquez sur son titre.</p>
    </div>
    <table id="postList" class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Aperçu</th>
                <th scope="col">Auteur</th>
                <th scope="col">Date d'édition</th>
                <th scope="col">Catégories</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody class="table-striped">
            <?php foreach ($posts as $post) : ?>
                <tr>
                    <th scope="row"><?php echo $i;
                                    $i++ ?></th>
                    <td><?= $post['post_title'] ?></td>
                    <td><?= $post['user_lastname'] ?></td>
                    <td><?= $post['user_id'] ?></td>
                    <td><?= $post['post_date'] ?></td>
                    <td>
                        <form id="usertype" action="index.php?action=admin&id=editCategory" method="POST">
                            <input type="hidden" name="category" value="<?= $user_id = $post['category_id'] ?>">
                            <select name="category_id" id="category_id">
                                <option value="<?= $post['category_id'] ?>"><?= $post['category_name'] ?></option>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <button class="type-badge">Modifier</button>
                        </form>
                    </td>
                    <td>
                        <center><a href="index.php?action=admin&id=deletePost<?= $post['post_id'] ?>" class="type-badge delete-bg">Supprimer</a></center>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>