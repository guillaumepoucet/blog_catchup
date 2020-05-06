<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="template/css/reset.css">
    <link rel="stylesheet" href="template/css/var.css">
    <link rel="stylesheet" href="template/css/style.css">

    <script src="template/assests/font-awesome/all.min.js"></script>

    <title>Le Bon Sens Français - <?=$pageTitle?></title>

</head>

<body>
    
    <!-- nav -->
    <?php include 'include/nav.php'; ?>
    
    <div id="page">

        <!-- main -->
        <?=$pageContent?>

        <!-- aside -->
        <?php include 'include/aside.php'; ?>

    </div>

    <!-- footer -->
    <?php include 'include/footer.php'; ?>
    
    <script src="template/assests/functions/nav.js"></script>

</body>

</html>