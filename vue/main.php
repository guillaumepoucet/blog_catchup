<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title><?= $title ?></title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="contenu/css/bootstrap.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="contenu/css/style.css" />
	<link type="text/css" rel="stylesheet" href="contenu/css/admin.css" />

	<!-- Editeur de texte Pell -->
    <link rel="stylesheet" type="text/css" href="..\contenu\pell-master\dist\pell.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

	<!-- Header -->
	<!-- <?php $navbar ?> -->
	<?php include('contenu/header.php')?>
	<!-- /Header -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			
			<div class="row">
				<div class="col-md-8">

					<?= $content ?>
					<!-- /recent blog posts -->

				</div>

				<!-- aside -->
				<div class="col-md-4">
					<!-- most read posts -->
					<!-- <?php include('contenu/most_read.php') ?> -->
					<!-- /most read posts -->

					<!-- ad -->
					<?php include('contenu/ad.php')?>
					<!-- /ad -->
					<?php if(isset($_GET['action']) && $_GET['action'] == 'post'): ?>
					<?php include ('contenu/featured_posts_list.php')?>
					<?php endif ?>
				</div>
				<!-- /aside -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2>Featured Posts</h2>
					</div>
				</div>

				<!-- featured posts -->
				<?php include('contenu/featured_posts.php') ?>
				<!-- /feqtured posts -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2>Most Read</h2>
							</div>
						</div>
						<!-- most read list -->
						<?php include('contenu/most_read_list.php') ?>
						<!-- /most read list -->

						<div class="col-md-12">
							<div class="section-row">
								<button class="primary-button center-block">Load More</button>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<!-- ad -->
					<?php include('contenu/ad.php') ?>
					<!-- /ad -->

					<!-- catagories & tags -->
					<?php include('contenu/categories.php') ?>
					<!-- /catagories & tags -->

				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- Footer -->
	<?php include('contenu/footer.php') ?>
	<!-- /Footer -->

	<!-- jQuery Plugins -->
	<script src="contenu/js/jquery.min.js"></script>
	<script src="contenu/js/bootstrap.min.js"></script>
	<script src="contenu/js/main.js"></script>

	<!-- Page de connection -->
	<script src="contenu/js/admin.js"></script>

</body>

</html>