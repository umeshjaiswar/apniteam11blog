<?php
if(isset($_POST['subcribe'])){
    $email = $_POST['email'];

    $insert = mysqli_query($conn,"INSERT INTO `subscribe`(`email`) VALUES ('$email')");
    if($insert){
        $_SESSION['success'] = "Thanks for subscribing to our newsletter";
    }else{
        $_SESSION['error'] = "Something went wrong";
    }
}

?>

<footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="widget">
                            <div class="footer-text text-center">
                                <!-- <a href="index.php"><img src="images/version/footer-logo.png" alt="" class="img-fluid"></a> -->
                                <h1 style="color: white;">ApniTeam11 Blog</h1>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum voluptates neque perferendis beatae totam itaque delectus excepturi ab, est asperiores.</p>
                                <div class="social">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                </div>

                                <hr class="invis">

                                <div class="newsletter-widget text-center">
                                    <form class="form-inline" method="POST">
                                        <input name="email" type="text" class="form-control" placeholder="Enter your email address">
                                        <button name="subcribe" type="submit" class="btn btn-primary">Subscribe <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div><!-- end newsletter -->
                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <br>
                        <div class="copyright">&copy; 2021-2022 | ApniTeam11</div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->