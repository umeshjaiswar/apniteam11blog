<?php
include('./admin/constant.php');
session_start();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $insertContact = mysqli_query($conn, "INSERT INTO `contact_us`(`name`, `email`, `phone`, `subject`, `message`) VALUES ('$name','$email','$phone','$subject','$message')");
    if ($insertContact) {
        $msg = "Name: " . $name . "\nEmail: " . $email . "\nPhone: " . $phone . "\nSubject: " . $subject . "\nMessage: " . $message;
        $sendMail = mail("umeshjaiswar176@gmail.com", "New Message From ApniTeam11 Blog", $msg);
        if ($sendMail == true) {
            $_SESSION['success'] = "Message sent successfully";
        } else {
            $_SESSION['error'] = "Oops...Something Went Wrong";
        }
    } else {
        $_SESSION['error'] = "Oops...Something Went Wrong";
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
                text:'<?php echo $_SESSION['success'] ?>',
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
                    text:'<?php echo $_SESSION['error'] ?>',
                    showConfirmButton: false,
                    timer: 3000
                })
            </script>
        <?php
        unset($_SESSION['error']);
        }

    ?>
    <div style="position: absolute;top:10px;right:0px;width:auto;padding:0.5rem 1rem;z-index: 1;
    background: #f4f4f4;
    border-left: 3px solid green;
    display: grid;display:none;" class="row">
        <p class="message" style="margin: 0;font-weight:bold;color: black;"> hey successfully message</p>
    </div>

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

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="page-wrapper">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h4>Who we are</h4>
                                    <p>Forest Time is a personal blog for handcrafted, cameramade photography content, fashion styles from independent creatives around the world.</p>
                                </div>

                                <div class="col-lg-4">
                                    <h4>How we help?</h4>
                                    <p>Etiam vulputate urna id libero auctor maximus. Nulla dignissim ligula diam, in sollicitudin ligula congue quis turpis dui urna nibhs. </p>
                                </div>

                                <div class="col-lg-4">
                                    <h4>Pre-Sale Question</h4>
                                    <p>Fusce dapibus nunc quis quam tempor vestibulum sit amet consequat enim. Pellentesque blandit hendrerit placerat. Integertis non.</p>
                                </div>
                            </div><!-- end row -->

                            <hr class="invis">

                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">
                                    <form class="form-wrapper" method="POST">
                                        <input type="text" class="form-control" placeholder="Your name" name="name" required>
                                        <input type="text" class="form-control" placeholder="Email address" name="email" required>
                                        <input type="text" class="form-control" placeholder="Phone" name="phone" required>
                                        <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                                        <textarea class="form-control" placeholder="Your message" name="message" required></textarea>
                                        <button style="cursor: pointer;" type="submit" class="btn btn-primary" name="submit">Send <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
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
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAkADq7R0xf6ami9YirAM1N-yl7hdnYBhM "></script>
    <!-- MAP & CONTACT -->
    <script src="js/map.js"></script>

</body>

</html>