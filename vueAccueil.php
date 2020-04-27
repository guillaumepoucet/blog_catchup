<?php $titre = 'Catch-up Blog' ?>

<?php ob_start() ?>

<!-- post -->
<?php while($post = $posts->fetch()): ?>
<div class="col-md-6">
	<div class="post">
		<a class="post-img" href="blog-post.php"><img src="./img/post-3.jpg" alt=""></a>
		<div class="post-body">
			<div class="post-meta">
				<a class="post-category cat-1" href="category.php">Web Design</a>
				<span class="post-date">March 27, 2018</span>
			</div>
			<h3 class="post-title"><a href="blog-post.php"><?= $post['post_title'] ?></a></h3>
		</div>
	</div>
</div>
<?php endwhile ?>
<!-- /post -->

<?php $content = ob_get_clean(); ?>

<?php require('main.php') ?>