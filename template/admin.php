<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/var.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">

    <script src="assests/font-awesome/all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>Le Bon Sens Français - Admin</title>

</head>

<body>
    
    <!-- nav -->
    <?php include 'include/nav.php'; ?>
    
    <div id="page">

        <!-- aside -->
        <aside id="adminAside">
            <?php include 'include/admin/asidebar.php'; ?>
        </aside>
        

        <!-- main -->
        <main id="adminMain">
            <!-- container pour le max width -->
            <div class="containerMain">

                <!-- content -->
                <?php 
                    if (empty($_GET['p'])) {
                        include 'include/admin/home.php'; 
                    } elseif ($_GET['p'] == 'articles') {
                        include 'include/admin/articles.php'; 
                    } elseif ($_GET['p'] == 'ajoutarticle') {
                        include 'include/admin/ajoutarticle.php'; 
                    } elseif ($_GET['p'] == 'utilisateurs') {
                        include 'include/admin/utilisateurs.php'; 
                    } elseif ($_GET['p'] == 'historique') {
                        include 'include/admin/historique.php'; 
                    } else {
                        include 'include/admin/home.php';
                    }
                ?>

            </div>
        </main>

    </div>
    
    <script src="assests/functions/nav.js"></script>

</body>



</html>