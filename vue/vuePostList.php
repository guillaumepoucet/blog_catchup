<?php $this->title = 'List des articles - Catchup Blog' ?>

<!-- Compteur tableau -->
<?php $i = 1 ?>

<div class="row">

    <?php if (isset($_SESSION['delete']) && ($_SESSION['delete'] == 'Ok')) : ?>
        <div class="col-md-12 alert alert-danger alert-dismissible show" role="alert">
            <strong>Article supprimé.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>
    <?php unset($_SESSION['delete']);?>

    <?php if (isset($_SESSION['archive']) && ($_SESSION['archive'] == 'Ok')) : ?>
        <div class="col-md-12 alert alert-warning alert-dismissible show" role="alert">
            <strong>Article archivé.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>
    <?php unset($_SESSION['archive']);?>

    <div class="col-md-12 alert alert-warning" role="alert">
        <p>Pour afficher un article, cliquez sur son titre.</p>
    </div>
    <table id="postList" class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th class="col-2" scope="col">Titre</th>
                <th class="col-3" scope="col">Auteur</th>
                <th scope="col">Date d'édition</th>
                <th class="col-5" scope="col">Catégories</th>
                <th scope="col"><center>Éditer</center></th>
                <th scope="col"><center>Archiver</center></th>
                <th scope="col"><center>Supprimer</center></th>
            </tr>
        </thead>
        <tbody class="table-striped">
            <?php foreach ($posts as $post) : ?>
                <tr>
                    <th scope="row"><?php echo $i;
                                    $i++ ?></th>
                    <td><a href="index.php?action=post&id=<?=$post['post_id']?>"><?= $post['post_title']?></a></td>
                    <td class="col-3"><?= $post['user_firstname'] . " " . $post['user_lastname'] ?></td>
                    <td><?= $post['post_date'] ?></td>
                    <td class="col-5">
                        <form id="category" action="index.php?action=admin&id=editCategory" method="POST">
                            <input type="hidden" name="post_id" value="<?= $post_id = $post['post_id'] ?>">
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
                        <center><a href="index.php?action=editPost&id=<?= $post['post_id'] ?>" class="type-badge delete-bg edit">Éditer</a></center>
                    </td>
                    <td>
                        <center><a href="index.php?action=archivePost&id=<?= $post['post_id'] ?>" class="type-badge delete-bg archive">Archiver</a></center>
                    </td>
                    <td>
                        <center><a href="index.php?action=deletePost&id=<?= $post['post_id'] ?>" class="type-badge delete-bg">Supprimer</a></center>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>