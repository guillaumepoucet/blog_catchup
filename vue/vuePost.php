<?php $this->title = $post['post_title'] . ' - Catchup Blog' ?>

<!-- Blog post -->
<!-- Page Header -->
<div id="post-header" class="page-header">
	<div class="background-img" style="background-image: url('<?= $post['post_cover_url'] ?>')"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="post-meta">
					<a class="post-category cat-2" href="category.html">JavaScript</a>
					<span class="post-date"><?= $post['post_date'] ?></span>
				</div>
				<h1><?= $post['post_title'] ?></h1>
			</div>
		</div>
	</div>
</div>
<!-- /Page Header -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- Post content -->
			<div class="col-md-8">
				<div class="section-row sticky-container">
					<div class="main-post">
						<?= $post['post_content'] ?>
					</div>
					<div class="post-shares sticky-shares">
						<a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
						<a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
						<a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
						<a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
						<a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-envelope"></i></a>
					</div>
				</div>

				<!-- ad -->
				<div class="section-row text-center">
					<a href="#" style="display: inline-block;margin: auto;">
						<img class="img-responsive" src="./img/ad-2.jpg" alt="">
					</a>
				</div>
				<!-- ad -->

				<!-- author -->
				<div class="section-row">
					<div class="post-author">
						<div class="media">
							<div class="media-left">
								<img class="media-object" src="<?= $post['user_photo_url'] ?>" alt="">
							</div>
							<div class="media-body">
								<div class="media-heading">
									<h3><?= $post['user_firstname'] . " " . $post['user_lastname'] ?></h3>
								</div>
								<p><?= $post['user_description'] ?>
								</p>
								<ul class="author-social">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /author -->

				<?php if(!isset($_SESSION['type'])):?>
				<div class="section-row">
					<div class="section-title">
						<p class="alert-comment"><a href="index.php?action=connection">Connectez-vous</a> pour laisser
							un commentaire !</p>
					</div>
				</div>
				<?php endif ?>

				<!-- comments -->
				<div class="section-row">
					<div class="section-title">
						<h2>3 Comments</h2>
					</div>

					<div class="post-comments">
						<!-- comment -->
						<?php foreach($comments as $comment): ?>
						<div class="media">
							<div class="media-left">
								<img class="media-object" src="<?= $comment['user_photo_url'] ?>" alt="">
							</div>
							<div class="media-body">
								<div class="media-heading">
									<h4><?= $comment['user_firstname'] . " " . $comment['user_lastname'] ?></h4>
									<span
										class="time"><?= strftime('%d %b. %Y, %R', strtotime($comment['comment_date'])) ?></span>
									<?php if(isset($_SESSION['type']) &&  $_SESSION['type']!== 3): ?>
									<a href="#" class="reply delete">Supprimer</a>
									<?php endif ?>
								</div>
								<p><?= $comment['comment_content'] ?>
								</p>
							</div>
						</div>
						<?php endforeach ?>
						<!-- /comment -->
					</div>

				</div>
				<!-- /comments -->

				<!-- reply -->

				<?php if(isset($_SESSION['type'])):?>
				<div class="section-row">
					<div class="section-title">
						<h2>Laisser un commentaire</h2>
					</div>
					<form class="post-reply" action="index.php?action=addComment&id=<?= $post_id = $_GET['id']?>" method="POST">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="hidden" name="post_id" value="">
									<textarea class="input" name="comment" placeholder="Votre commentaire"></textarea>
								</div>
								<button class="primary-button">Envoyer</button>
							</div>
						</div>
					</form>
				</div>
				<?php endif ?>
				<!-- /reply -->

			</div>
			<!-- /Post content -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->