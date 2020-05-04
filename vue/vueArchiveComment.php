<?php $this->title = 'Liste des commentaires archivés - Catchup Blog' ?>

<!-- Compteur tableau -->
<?php $i = 1 ?>

<h3>Liste des commentaires archivés</h3>

<div class="row">

    <?php if (isset($_SESSION['delete']) && ($_SESSION['delete'] == 'Ok')) : ?>
        <div class="col-md-12 alert alert-danger alert-dismissible show" role="alert">
            <strong>Commentaire supprimé.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>
    <?php unset($_SESSION['delete']); ?>

    <table id="postList" class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th class="col-2" scope="col">Commentaire</th>
                <th scope="col">Date d'archivage</th>
                <th scope="col">Archivé par</th>
                <th scope="col">Supprimer</th>

            </tr>
        </thead>
        <tbody class="table-striped">
            <?php foreach ($archives as $archive) : ?>
                <tr>
                    <th scope="row"><?php echo $i;
                                    $i++ ?></th>
                    <td><?= $archive['comment_content'] ?></td>
                    <td><?= $archive['comment_archive_date'] ?></td>
                    <td><?= $archive['user_firstname'] . " " . $archive['user_lastname']?></td>
                    <td>
                        <center><a href="index.php?action=deleteArchComment&id=<?=$archive['comment_id']?>" class="type-badge delete-bg">Supprimer</a></center>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>