<?php $this->title = 'Liste des articles archivés - Catchup Blog' ?>

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
    <?php unset($_SESSION['delete']); ?>

    <div class="col-md-12 alert alert-warning" role="alert">
        <p>Pour afficher un article, cliquez sur son titre.</p>
    </div>
    
    <table id="postList" class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th class="col-2" scope="col">Titre</th>
                <th scope="col" class="col-3">Date d'archivage</th>
                <th scope="col" class="col-4">Archivé par</th>
                <th scope="col"><center>Réactiver</center></th>
                <th scope="col"><center>Supprimer</center></th>

            </tr>
        </thead>
        <tbody class="table-striped">
            <?php foreach ($archives as $archive) : ?>
                <tr>
                    <th scope="row"><?php echo $i;
                                    $i++ ?></th>
                    <td><a href="index.php?action=post&id=<?= $archive['post_id'] ?>"><?= $archive['post_title'] ?></a></td>
                    <td class="col-3"><?= $archive['post_archive_date'] ?></td>
                    <td class="col-4"><?= $archive['user_firstname'] . " " . $archive['user_lastname']?></td>
                    <td>
                        <center><a href="index.php?action=reactPost&id=<?= $archive['post_id'] ?>" class="type-badge delete-bg archive-btn">Réactiver</a></center>
                    </td>
                    <td>
                        <center><a href="index.php?action=deletePost&id=<?=$archive['post_id']?>" class="type-badge delete-bg">Supprimer</a></center>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>