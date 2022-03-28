<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
</head>
<?php
include('../../constant.php');
session_start();


if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $file = $_FILES['file'];
    $author_name = $_POST['author_name'];
    $about_author = $_POST['about_author'];
    $category = $_POST['category'];
    $created_by = $_SESSION['email'];
    
    $target_dir = "./uploads/";
    $imageFileType = strtolower(pathinfo(basename($_FILES["file"]["name"]), PATHINFO_EXTENSION));
    $name = md5(date('Y-m-d H:i:s') . basename($_FILES["file"]["name"])) . "." . $imageFileType;
    $target_file = $target_dir . $name;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $link = $base_url . "pages/blog/uploads/" . $name;

        $insert = "INSERT INTO `blog`(`title`, `content`, `image`,`category`, `author_name`, `about_author`,`created_by`) VALUES ('$title','$content','$link','$category','$author_name','$about_author','$created_by')";
        $query = mysqli_query($conn, $insert);
        if ($query) {
            // echo "Blog Added Successfully";
            $_SESSION['success'] = "Blog Added Successfully";
        } else {
            $_SESSION['error'] = "Error: " . mysqli_errno($conn);
            // echo "Error: " . mysqli_errno($conn);
        }
    } else {
        $_SESSION['error'] = "Sorry, there was an error uploading your file.";
        // echo "Sorry, there was an error uploading your file.";
    }

    header("Location: index.php");
}
?>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.php -->
        <?php include('../../partials/_navbar.php') ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/__sidebar.php -->
            <?php include('../../partials/_sidebar.php') ?>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Add Blog </h3>
                        <a href="./index.php">
                            <button type="button" class="btn btn-gradient-primary btn-fw"><i class="mdi mdi-arrow-left"></i> Back</button>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample" method="POST" enctype='multipart/form-data'>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title</label>
                                            <input name="title" type="text" class="form-control" id="exampleInputName1" placeholder="Title" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Content</label>
                                            <textarea name="content" id="summernote" class="form-control" cols="30" rows="10" placeholder="Content" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Banner Image upload</label>
                                            <input type="file" name="file" class="file-upload-default" accept=".jpg,.jpge,.png" required>
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Category</label>
                                            <input list="browsers" name="category" type="text" class="form-control" id="exampleInputPassword4" placeholder="Category" required>
                                            <datalist id="browsers" required>
                                                <?php
                                                $select = mysqli_query($conn, "SELECT `category` FROM `blog` WHERE `deleted_at` is null");
                                                if ($select->num_rows > 0) {
                                                    $category = array();
                                                    while ($data = mysqli_fetch_assoc($select)) {

                                                        if (in_array($data['category'], $category)) {
                                                        } else {
                                                ?>
                                                            <option value="<?php echo $data['category']; ?>"></option>
                                                <?php
                                                        }
                                                        array_push($category, $data['category']);
                                                    }
                                                }
                                                ?>
                                            </datalist>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Author Name</label>
                                            <input name="author_name" type="text" class="form-control" id="exampleInputPassword4" placeholder="Author name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">About Author</label>
                                            <input name="about_author" type="text" class="form-control" id="exampleInputPassword4" placeholder="About Author" required>
                                        </div>

                                        <button name="submit" type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                        <button type="submit" class="btn btn-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="../../assets/js/off-canvas.js"></script>
        <script src="../../assets/js/hoverable-collapse.js"></script>
        <script src="../../assets/js/misc.js"></script>
        <script src="../../assets/js/file-upload.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <!-- End custom js for this page -->

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


        <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote({
                    placeholder: 'Add Content',
                    tabsize: 2,
                    height: 200,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            });
        </script>
</body>

</html>