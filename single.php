<?php
include('./admin/constant.php');
session_start();
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `blog` WHERE `id` = '$id'"));

//updating views per page load
$views = $data['views'];
$views = $views + 1;
$update_views = mysqli_query($conn, "UPDATE `blog` SET `views`='$views' WHERE `id`='$id'");
?>

<?php
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $website = $_POST['website'] ? $_POST['website'] : "No Website";
    $comment = $_POST['comment'];

    $insert = mysqli_query($conn, "INSERT INTO `comments`(`blog_id`, `name`, `email`, `website`, `comment`) VALUES ('$id','$name','$email','$website','$comment')");
    if ($insert) {
        $_SESSION['success'] = "Comment Post Successfully";
    } else {
        $_SESSION['error'] = "Error... Something Went Wrong";
    }
}
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
                        <?php include('./header.php') ?>
                    </div>
                </nav>
            </div><!-- end container -->
        </header><!-- end header -->

        <div class="page-title wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-leaf bg-green"></i> Blog</h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
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
                            <div class="blog-title-area">
                                <span class="color-green"><a href="category.php?category=<?php echo $data['category'] ?>" title=""><?php echo $data['category'] ?></a></span>

                                <h3><?php echo $data['title'] ?></h3>

                                <div class="blog-meta big-meta">
                                    <small><?php echo date("jS \of F Y ", strtotime($data['created_at'])); ?></a></small>
                                    <small>by <?php echo $data['author_name'] ?></small>
                                    <small><i class="fa fa-eye"></i> <?php echo $data['views'] ?></a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $site_url; ?>single.php?id=<?php echo $id; ?>" target="_blank" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="https://twitter.com/intent/tweet?url=<?php echo $site_url; ?>single.php?id=<?php echo $id; ?>&text=Check%20Out%20This%20Amazing%20Post" target="_blank" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>

                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="<?php echo $data['image'] ?>" alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">
                                <div class="pp">
                                    <p>
                                        <?php echo $data['content'] ?>
                                    </p>

                                </div><!-- end pp -->
                            </div><!-- end content -->

                            <div class="blog-title-area">
                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $site_url; ?>single.php?id=<?php echo $id; ?>" target="_blank" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="https://twitter.com/intent/tweet?url=<?php echo $site_url; ?>single.php?id=<?php echo $id; ?>&text=Check%20Out%20This%20Amazing%20Post" target="_blank" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>

                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <hr class="invis1">

                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">About author</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="./images/user.jpg" alt="" class="img-fluid rounded-circle">
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#"><?php echo $data['author_name'] ?></a></h4>
                                        <p><?php echo $data['about_author'] ?></p>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">You may also like</h4>
                                <div class="row">
                                    <?php
                                    $match = $data['category'];
                                    $select = "SELECT * FROM `blog` WHERE `category` like '$match' and `id` != '$id' and `deleted_at` is null limit 0,2";
                                    $query = mysqli_query($conn, $select);
                                    if ($query->num_rows > 0) {
                                        while ($data1 = mysqli_fetch_assoc($query)) {
                                    ?>
                                            <div class="col-lg-6">
                                                <div class="blog-box">
                                                    <div class="post-media">
                                                        <a href="single.php?id=<?php echo $data1['id']; ?>" title="">
                                                            <img src="<?php echo $data1['image']; ?>" alt="" class="img-fluid">

                                                        </a>
                                                    </div>
                                                    <div class="blog-meta">
                                                        <h4><a href="single.php?id=<?php echo $data1['id']; ?>" title=""><?php echo $data1['title']; ?></a></h4>
                                                        <small>Trends</small>
                                                        <small><?php echo date("jS \of F Y ", strtotime($data1['created_at'])); ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }else {
                                        $select = "SELECT * FROM `blog` WHERE `id` != '$id' and `deleted_at` is null ORDER by id DESC limit 0,2";
                                        $query = mysqli_query($conn, $select);
                                        if ($query->num_rows > 0) {
                                            while ($data1 = mysqli_fetch_assoc($query)) {
                                            ?>
                                                <div class="col-lg-6">
                                                    <div class="blog-box">
                                                        <div class="post-media">
                                                            <a href="single.php?id=<?php echo $data1['id']; ?>" title="">
                                                                <img src="<?php echo $data1['image']; ?>" alt="" class="img-fluid">

                                                            </a>
                                                        </div>
                                                        <div class="blog-meta">
                                                            <h4><a href="single.php?id=<?php echo $data1['id']; ?>" title=""><?php echo $data1['title']; ?></a></h4>
                                                            <small>Trends</small>
                                                            <small><?php echo date("jS \of F Y ", strtotime($data1['created_at'])); ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                    <?php
                                            }
                                        }
                                    }

                                    ?>

                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <?php
                                $commentCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(`id`) FROM `comments` WHERE `blog_id` = '$id'"));
                                ?>
                                <h4 class="small-title"><?php echo $commentCount["count(`id`)"] ?> Comments</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
                                            <?php
                                            $comment = mysqli_query($conn, "SELECT * FROM `comments` WHERE `blog_id` = '$id' ");
                                            if ($comment->num_rows > 0) {
                                                while ($commentData = mysqli_fetch_assoc($comment)) {
                                            ?>
                                                    <div class="media">
                                                        <a class="media-left" href="#">
                                                            <img src="./images/user.jpg" alt="" class="rounded-circle">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading user_name"><?php echo $commentData['name'] ?> <small><?php echo date("jS \of F Y ", strtotime($commentData['created_at'])); ?></small></h4>
                                                            <p><?php echo $commentData['comment'] ?></p>
                                                            <!-- <a href="#" class="btn btn-primary btn-sm">Reply</a> -->
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            }

                                            ?>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">Leave a Reply</h4>
                                <div class="row">

                                    <div class="col-lg-12">
                                        <form class="form-wrapper" method="POST">
                                            <input type="text" class="form-control" placeholder="Your name" name="name" required>
                                            <input type="text" class="form-control" placeholder="Email address" name="email" required>
                                            <input type="text" class="form-control" placeholder="Website" name="website">
                                            <textarea class="form-control" placeholder="Your comment" name="comment" required></textarea>
                                            <button style="cursor: pointer;" type="submit" class="btn btn-primary" name="submit">Submit Comment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->

                    <!-- sidebar start here  -->
                    <?php include('./sidebar.php') ?>
                    <!-- end here  -->



                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <?php include('./footer.php'); ?>

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