<?php
include('./admin/constant.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>ApniTeam11 Blog</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="css/font-awesome.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="style.css" rel="stylesheet">

<!-- Responsive styles for this template -->
<link href="css/responsive.css" rel="stylesheet">

<!-- Colors for this template -->
<link href="css/colors.css" rel="stylesheet">

<!-- Version Garden CSS for this template -->
<link href="css/version/garden.css" rel="stylesheet">

<!-- sweetalert cdn  -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- jquery cnd  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <?php
    if (isset($_SESSION['success'])) {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?php echo $_SESSION['success'] ?>',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    <?php
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['error'])) {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops..',
                text: '<?php echo $_SESSION['error'] ?>',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    <?php
        unset($_SESSION['error']);
    }

    ?>

    <div id="wrapper">


        <div class="topbar-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 hidden-xs-down">
                        <div class="topsocial">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Flickr"><i class="fa fa-flickr"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google+"><i class="fa fa-google-plus"></i></a>
                        </div><!-- end social -->
                    </div><!-- end col -->

                    <div class="col-lg-4 hidden-md-down">
                    </div><!-- end col -->


                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end topbar -->

        <div class="header-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo">
                            <!-- <a href="index.php"><img src="images/version/logo.png" alt=""></a> -->
                            <h1 style="text-align: center;">ApniTeam11 Blog</h1>
                        </div><!-- end logo -->
                    </div>
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end header -->

        <header class="header">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-toggleable-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Forest Timemenu" aria-controls="Forest Timemenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-center" id="Forest Timemenu">
                        <?php include('./header.php'); ?>
                    </div>
                </nav>
            </div><!-- end container -->
        </header><!-- end header -->

        <section class="section first-section">
            <div class="container-fluid">
                <div class="masonry-blog clearfix">
                    <div class="left-side">
                        <div class="masonry-box post-media">
                            <?php
                            $Blog = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `blog` WHERE `deleted_at` is null LIMIT 0,1"));
                            ?>
                            <img src="<?php echo $Blog['image']; ?>" alt="" class="img-fluid">
                            <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="category.php?category=<?php echo $Blog['category']; ?>"><?php echo $Blog['category']; ?></a></span>
                                        <h4><a href="single.php?id=<?php echo $Blog['id']; ?>" title=""><?php echo $Blog['title']; ?></a></h4>
                                        <small style="color: white;"><i class="fa fa-eye"></i> <?php echo $Blog['views'] ?></small>
                                        <small style="color: white;"><?php echo date("jS \of F Y ", strtotime($Blog['created_at'])); ?></a></small>
                                        <small style="color: white;"><?php echo $Blog['author_name']; ?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end left-side -->

                    <div class="center-side">
                        <div class="masonry-box post-media">
                            <?php
                            $Blog = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `blog` WHERE `deleted_at` is null LIMIT 1,1"));
                            ?>
                            <img src="<?php echo $Blog['image']; ?>" alt="" class="img-fluid">
                            <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="category.php?category=<?php echo $Blog['category']; ?>" title=""><?php echo $Blog['category']; ?></a></span>
                                        <h4><a href="single.php?id=<?php echo $Blog['id']; ?>" title=""><?php echo $Blog['title']; ?></a></h4>
                                        <small style="color: white;"><i class="fa fa-eye"></i> <?php echo $Blog['views'] ?></small>
                                        <small style="color: white;"><?php echo date("jS \of F Y ", strtotime($Blog['created_at'])); ?></a></small>
                                        <small style="color: white;"><?php echo $Blog['author_name']; ?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end left-side -->

                    <div class="right-side hidden-md-down">
                        <div class="masonry-box post-media">
                            <?php
                            $Blog = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `blog` WHERE `deleted_at` is null LIMIT 2,1"));
                            ?>
                            <img src="<?php echo $Blog['image']; ?>" alt="" class="img-fluid">
                            <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="category.php?category=<?php echo $Blog['category']; ?>" title=""><?php echo $Blog['category']; ?></a></span>
                                        <h4><a href="single.php?id=<?php echo $Blog['id']; ?>" title=""><?php echo $Blog['title']; ?></a></h4>
                                        <small style="color: white;"><i class="fa fa-eye"></i> <?php echo $Blog['views'] ?></small>
                                        <small style="color: white;"><?php echo date("jS \of F Y ", strtotime($Blog['created_at'])); ?></a></small>
                                        <small style="color: white;"><?php echo $Blog['author_name']; ?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end right-side -->
                </div><!-- end masonry -->
            </div>
        </section>

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-list clearfix">
                                <div class="blog-box row">
                                    <?php
                                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                                        $search = $_GET['search'];
                                        $query = mysqli_query($conn, "SELECT * FROM `blog` WHERE (`deleted_at` is null) and (`title` like '%$search%' or `author_name` like '%$search%' or `category` like '%$search%') order by `id` desc");
                                    } else {
                                        $query = mysqli_query($conn, "SELECT * FROM `blog` WHERE `deleted_at` is null order by `id` desc");
                                    }
                                    if ($query->num_rows > 0) {
                                        while ($data = mysqli_fetch_assoc($query)) {

                                    ?>
                                            <div class="col-md-4">
                                                <div class="post-media">
                                                    <a href="single.php?id=<?php echo $data['id']; ?>" title="">
                                                        <img src="<?php echo $data['image']; ?>" alt="" class="img-fluid">
                                                        <div class="hovereffect"></div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="blog-meta big-meta col-md-8">
                                                <span class="bg-aqua"><a href="category.php?category=<?php echo $data['category']; ?>" title=""><?php echo $data['category']; ?></a></span>
                                                <h4><a href="single.php?id=<?php echo $data['id']; ?>" title=""><?php echo $data['title']; ?></a></h4>
                                                <p></p>
                                                <small><i class="fa fa-eye"></i> <?php echo $data['views']; ?></small>
                                                <small><?php echo date("jS \of F Y ", strtotime($data['created_at'])); ?></small>
                                                <small>by <?php echo $data['author_name']; ?></small>
                                            </div>

                                            <hr class="invis">
                                    <?php

                                        }
                                    }
                                    ?>
                                    <!-- <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="single.php" title="">
                                                <img src="upload/garden_sq_01.jpg" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="blog-meta big-meta col-md-8">
                                        <span class="bg-aqua"><a href="category.php" title="">Indoor</a></span>
                                        <h4><a href="single.php" title="">The best twenty plant species you can look at at home</a></h4>
                                        <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                        <small><a href="category.php" title=""><i class="fa fa-eye"></i> 1887</a></small>
                                        <small><a href="single.php" title="">11 July, 2017</a></small>
                                        <small><a href="#" title="">by Matilda</a></small>
                                    </div> -->
                                </div><!-- end blog-box -->


                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                        <div class="row">
                            <!-- <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> -->
                        </div>
                    </div><!-- end col -->

                    <!-- sidebar start here  -->
                    <?php include('./sidebar.php') ?>
                    <!-- end here  -->

                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <!-- footer section start here  -->
        <?php include('./footer.php'); ?>
        <!-- footer end here  -->


        <div class="dmtop"></div>

    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>