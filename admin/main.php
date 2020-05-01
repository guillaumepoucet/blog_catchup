<?php if (isset($_SESSION) && (isset($_SESSION['firstname']))): ?>

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
	<link rel="stylesheet" href="contenu/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="contenu/css/style.css" />
	<link type="text/css" rel="stylesheet" href="contenu/css/admin.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

	<!-- Header -->
	<?php include('contenu/header.php') ?>
	<!-- /Header -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- aside -->
					<div class="col-md-3">
						<h3>Menu</h3>
					</div>
					<!-- /aside -->	

				<div class="col-md-9">
				
				<?= $content ?>
					<!-- /recent blog posts -->

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
	<!-- <script src="contenu/js/admin.js"></script> -->

</body>

</html>
<?php else: ?>
<?php header('location:index.php?action=admin&id=aff') ?>
<?php endif ?>