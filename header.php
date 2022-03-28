<?php
include('./admin/constant.php');
?>

<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link color-green-hover" href="index.php">Home</a>
    </li>
    <?php
    $category = mysqli_query($conn, "SELECT`category`FROM `blog` WHERE `deleted_at` is NULL");
    if ($category->num_rows > 0) {
        $categoryArray = array();
        while ($categoryData = mysqli_fetch_assoc($category)) {
            if (in_array($categoryData['category'], $categoryArray)) {
            } else {
    ?>
                <li class="nav-item">
                    <a class="nav-link color-green-hover" href="category.php?category=<?php echo $categoryData['category'] ?>"><?php echo $categoryData['category'] ?></a>
                </li>
    <?php
            }
            array_push($categoryArray, $categoryData['category']);
        }
    }

    ?>
    <li class="nav-item">
        <a class="nav-link color-green-hover" href="contact.php">Contact</a>
    </li>
    
</ul>

<script>
    $('.navbar-toggler').click(function() {
        $('.navbar-collapse').toggle()
    })
</script>