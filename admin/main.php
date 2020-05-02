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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
		<div class="container-fluid">

			<!-- row -->
			<div class="row">
				<div id="admin-header" class="row">
					<div class="col-md-2 admin-photo">
						<img class="media-object" src="<?= $_SESSION['photo'] ?>" alt="">
					</div>
					<div class="col-md-9">
						<h2>Bonjour <?= $_SESSION['firstname'] ?>,</h2>
					</div>
				</div>
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row admin-grid">
				<!-- aside -->
				<div class="admin-aside">
					<div>
						<h4>Gérer mon profil</h4>
						<a href="">Modifier mes informations</a>
						<a href="">Changer ma photo de profil</a>
						<a href="">Supprimer mon profil</a>
					</div>

					<?php if($_SESSION['type'] == 1): ?>
					<div>
						<h4>Gérer les articles</h4>
						<a href="">Rédiger un article</a>
					</div>
					<div>
						<h4>Gérer les utilisateurs</h4>
						<a href="index.php?action=admin&id=userlist">Liste des utilisateurs</a>
					</div>
					<?php endif ?>

				</div>
				<!-- /aside -->

				<div class="content">

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
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	</script>
	<!-- Page de connection -->
	<!-- <script src="contenu/js/admin.js"></script> -->

</body>

</html>
<?php else: ?>
<?php header('location:index.php?action=admin&id=aff') ?>
<?php endif ?>