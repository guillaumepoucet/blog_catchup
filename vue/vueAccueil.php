<?php $titre = 'Catch-up Blog' ?>

<?php ob_start() ?>

<!-- post -->
<div class="section-title">
	<h2>Articles récents</h2>
</div>
<!-- row -->
<div class="row">
	<!-- recent blog posts -->

	<?php while($post = $posts->fetch()): ?>
	<div class="col-md-6">
		<div class="post">
			<a class="post-img" href="<?= 'index.php?action=post&id=' . $post['post_id'] ?>">
			<img src="./contenu/img/post-3.jpg" alt=""></a>
			<div class="post-body">
				<div class="post-meta">
					<a class="post-category cat-1" href="category.php">Web Design</a>
					<span class="post-date"><?= $post['post_date'] ?></span>
				</div>
				<h3 class="post-title"><a href="<?= 'index.php?action=post&id=' . $post['post_id'] ?>"><?= $post['post_title'] ?></a>
				</h3>
			</div>
		</div>
	</div>
	<?php endwhile ?>
</div>
<!-- /post -->

<?php $content = ob_get_clean(); ?>

<?php require('main.php') ?>