<header id="header">
    <!-- Nav -->
    <div id="nav">
        <!-- Main Nav -->
        <div id="nav-fixed">
            <div class="container">
                <!-- logo -->
                <div class="nav-logo">
                    <a href="index.php" class="logo"><img src=".\contenu\img\logoCatchUp.png" alt=""></a>
                </div>
                <!-- /logo -->

                <!-- nav -->
                <ul class="nav-menu nav navbar-nav">
                    <li><a href="category.php">News</a></li>
                    <li><a href="category.php">Popular</a></li>
               
                    <!-- <?php foreach($categories as $categorie): ?> -->
                    <li class="cat-"><a href="category.php"></a></li>
                    <!-- <?php endforeach ?> -->
                </ul>
                <!-- /nav -->
                
                <!-- search & aside toggle -->
                <div class="nav-btns">
                    <?php if(empty($_SESSION)): ?>
                    <a class="nav-login-btn" href="index.php?action=connection">Se connecter</a>
                    <?php elseif (isset($_SESSION)): ?>
                        <a class="nav-login-btn" href="index.php?action=admin"><?=$_SESSION['firstname']?></a>
                        <a class="logout-btn" href="index.php?action=deconnection"><img src="contenu\img\icons\sign-out-alt-solid.svg"></a>
                        <?php endif ?>
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div class="search-form">
                        <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                        <button class="search-close"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Main Nav -->

        <!-- Aside Nav -->
        <div id="nav-aside">
            <!-- nav -->
            <div class="section-row">
                <ul class="nav-aside-menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="#">Join Us</a></li>
                    <li><a href="#">Advertisement</a></li>
                    <li><a href="contact.php">Contacts</a></li>
                    <?php if(!isset($_SESSION)): ?>
                    <li><a class="nav-login-btn" href="index.php?action=connection">Se connecter</a></li>
                    <?php elseif (isset($_SESSION)): ?>
                        <li><a class="nav-login-btn" href="index.php?action=admin">Votre compte</a></li>
                        <li><a class="nav-login-btn" href="index.php?action=deconnection">Se déconnecter</a></li>
                    <?php endif ?>
                    
                </ul>
            </div>
            <!-- /nav -->
            
            <!-- widget posts -->
            <div class="section-row">
                <h3>Recent Posts</h3>
                <div class="post post-widget">
                    <a class="post-img" href="blog-post.php"><img src="/contenu/img/widget-2.jpg" alt=""></a>
                    <div class="post-body">
                        <h3 class="post-title"><a href="blog-post.php">Pagedraw UI Builder Turns Your Website Design
                                Mockup Into Code Automatically</a></h3>
                    </div>
                </div>

                <div class="post post-widget">
                    <a class="post-img" href="blog-post.php"><img src="./contenu/img/widget-3.jpg" alt=""></a>
                    <div class="post-body">
                        <h3 class="post-title"><a href="blog-post.php">Why Node.js Is The Coolest Kid On The Backend
                                Development Block!</a></h3>
                    </div>
                </div>

                <div class="post post-widget">
                    <a class="post-img" href="blog-post.php"><img src="./contenu/img/widget-4.jpg" alt=""></a>
                    <div class="post-body">
                        <h3 class="post-title"><a href="blog-post.php">Tell-A-Tool: Guide To Web Design And
                                Development Tools</a></h3>
                    </div>
                </div>
            </div>
            <!-- /widget posts -->

            <!-- social links -->
            <div class="section-row">
                <h3>Follow us</h3>
                <ul class="nav-aside-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>
            <!-- /social links -->

            <!-- aside nav close -->
            <button class="nav-aside-close"><i class="fa fa-times"></i></button>
            <!-- /aside nav close -->
        </div>
        <!-- Aside Nav -->
    </div>
    <!-- /Nav -->
</header>