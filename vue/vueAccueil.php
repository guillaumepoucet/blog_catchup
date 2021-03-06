<?php $this->title = 'Accueil - Catchup Blog' ?>

<!-- post -->
<div class="section-title">
	<h2>Articles récents</h2>
</div>
<!-- row -->
<div class="row">
	<!-- recent blog posts -->
	
	<?php foreach($posts as $post): ?>
	<div class="col-md-6">
		<div class="post">
			<a class="post-img main" href="<?= 'index.php?action=post&id=' . $post['post_id'] ?>">
			<img src="<?= $post['post_cover_url'] ?>" alt=""></a>
			<div class="post-body">
				<div class="post-meta">
					<a class="post-category cat-<?=$post['category_id']?>" href="category.php"><?=$post['category_name']?></a>
					<span class="post-date"><?= strftime('%d %b. %Y', strtotime($post['post_date'])) ?></span>
				</div>
				<h3 class="post-title"><a href="<?= 'index.php?action=post&id=' . $post['post_id'] ?>"><?= $post['post_title'] ?></a>
				</h3>
			</div>
		</div>
	</div>
	<?php endforeach ?>
</div>
<!-- /post -->