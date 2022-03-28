<?php
if(isset($_GET['submitSearch'])){
    $search = $_GET['search'];
    ?>
    <script>
        window.location = "index.php?search=<?php echo $search;?>"
    </script>
    <?php
}
if(isset($_GET['search'])){
    $searchVal = $_GET['search'];
}else{
    $searchVal = '';
}
?>

<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        <div class="widget">
            <h2 class="widget-title">Search</h2>
            <form class="form-inline search-form" method="get">
                <div class="form-group">
                    <input value="<?php echo $searchVal ; ?>" name="search" type="text" class="form-control" placeholder="Search on the site">
                </div>
                <button name="submitSearch" type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </form>
        </div><!-- end widget -->

        <div class="widget">
            <h2 class="widget-title">Recent Posts</h2>
            <div class="blog-list-widget">
                <div class="list-group">
                    <?php
                    if(isset($_GET['id']) && !empty($_GET['id'])){
                        $searchByID = "WHERE `id` != '".$id."' and `deleted_at` is null";
                    }else{
                        $searchByID ="WHERE `deleted_at` is null";
                    }
                    $recent = mysqli_query($conn, "SELECT * FROM `blog` $searchByID order by `id` DESC LIMIT 0,3");
                   
                    
                    if ($recent->num_rows > 0) {
                        while ($recentData = mysqli_fetch_assoc($recent)) {
                    ?>
                            <a href="single.php?id=<?php echo $recentData['id']; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="w-100 justify-content-between">
                                    <img src="<?php echo $recentData['image']; ?>" alt="" class="img-fluid float-left">
                                    <h5 class="mb-1"><?php echo $recentData['title']; ?></h5>
                                    <small><?php echo date("jS \of F Y ", strtotime($recentData['created_at'])); ?></small>
                                </div>
                            </a>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div><!-- end blog-list -->
        </div><!-- end widget -->

        <div class="widget">
            <h2 class="widget-title">Advertising</h2>
            <div class="banner-spot clearfix">
                <div class="banner-img">
                    <img src="upload/banner_04.jpg" alt="" class="img-fluid">
                </div><!-- end banner-img -->
            </div><!-- end banner -->
        </div><!-- end widget -->

        <!-- <div class="widget">
                                <h2 class="widget-title">Instagram Feed</h2>
                                <div class="instagram-wrapper clearfix">
                                    <a href="#"><img src="upload/garden_sq_01.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_02.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_03.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_04.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_05.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_06.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_07.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_08.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_09.jpg" alt="" class="img-fluid"></a>
                                </div>
                            </div> -->

        <div class="widget">
            <h2 class="widget-title">Popular Categories</h2>
            <div class="link-widget">
                <ul>
                    <?php
                        $popular = mysqli_query($conn, "SELECT `category` FROM `blog` WHERE `deleted_at` is null");
                        if ($popular->num_rows > 0) {
                            $popularArray = array();
                            while ($popularData = mysqli_fetch_assoc($popular)) {
                                if (in_array($popularData['category'], $popularArray)) {
                                } else {
                                    $categoryname = $popularData['category'];
                                    $count = mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(`id`) FROM `blog` WHERE `category` = '$categoryname' and `deleted_at` is null"));
                                    
                        ?>              
                                   <li><a href="category.php?category=<?php echo $popularData['category']; ?>"><?php echo $popularData['category']; ?> <span>(<?php echo $count["count(`id`)"] ?>)</span></a></li>
                        <?php
                                }
                                array_push($popularArray, $popularData['category']);
                            }
                        }
                    ?>
                    <!-- <li><a href="#">Gardening <span>(21)</span></a></li>
                    <li><a href="#">Outdoor Living <span>(15)</span></a></li>
                    <li><a href="#">Indoor Living <span>(31)</span></a></li>
                    <li><a href="#">Shopping Guides <span>(22)</span></a></li>
                    <li><a href="#">Pool Design <span>(66)</span></a></li> -->
                </ul>
            </div><!-- end link-widget -->
        </div><!-- end widget -->
    </div><!-- end sidebar -->
</div><!-- end col -->