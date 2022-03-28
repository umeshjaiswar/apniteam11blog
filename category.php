<?php
include('./admin/constant.php');
session_start();
$categoryId = $_GET['category'];
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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

        <div class="page-title wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2 style="text-transform: capitalize;"><i class="fa fa-leaf bg-green"></i> Category by: <?php echo $categoryId; ?></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                            <li class="breadcrumb-item">Blog</li>
                            <li class="breadcrumb-item active"><?php echo $categoryId; ?></li>
                        </ol>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-list clearfix">
                                <?php
                                $selectCategory = mysqli_query($conn, "SELECT * FROM `blog` WHERE `category` like '$categoryId' and `deleted_at` is null ");
                                if ($selectCategory->num_rows > 0) {
                                    while ($categoryData = mysqli_fetch_assoc($selectCategory)) {
                                ?>

                                        <div class="blog-box row">
                                            <div class="col-md-4">
                                                <div class="post-media">
                                                    <a href="single.php?id=<?php echo $categoryData['id']; ?>" title="">
                                                        <img src="<?php echo $categoryData['image']; ?>" alt="" class="img-fluid">
                                                        <div class="hovereffect"></div>
                                                    </a>
                                                </div><!-- end media -->
                                            </div><!-- end col -->

                                            <div class="blog-meta big-meta col-md-8">
                                                <span class="bg-aqua"><a href="category.php?category=<?php echo $categoryData['category']; ?>" title=""><?php echo $categoryData['category']; ?></a></span>
                                                <h4><a href="single.php?id=<?php echo $categoryData['id']; ?>" title=""><?php echo $categoryData['title']; ?></a></h4>
                                                <!-- <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p> -->
                                                <small<i class="fa fa-eye"></i> <?php echo $categoryData['views']; ?></small>
                                                    <small><?php echo date("jS \of F Y ", strtotime($categoryData['created_at'])); ?></small>
                                                    <small>by <?php echo $categoryData['author_name']; ?></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                        <hr class="invis">
                                <?php
                                    }
                                }
                                ?>



                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                        <!-- <div class="row">
                            <div class="col-md-12">
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
                            </div>
                        </div> -->
                    </div>

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