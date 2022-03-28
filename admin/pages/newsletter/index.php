<?php
include('../../constant.php');
session_start();
?>
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .table td img {
            width: 60px;
            height: 60px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <?php
    if (isset($_SESSION['success'])) {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title:'Success',
                text: '<?php echo $_SESSION['success']; ?>',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    <?php
        unset($_SESSION['success']);
    }

    if ((isset($_SESSION['error']))) {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'oops..',
                text: '<?php echo $_SESSION['error']; ?>',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    <?php
        unset($_SESSION['error']);
    }

    ?>
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
                        <h3 class="page-title">News Letter Content </h3>
                    </div>

                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">News Letter table</h4>
                                </p>
                                <table id="datatable" class="table table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Email</th>
                                            <th> Date Time </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <tr>
                                            <td> 1 </td>
                                            <td> <img src="https://dummyimage.com/80x80/000/fff" alt=""> </td>
                                            <td>
                                                <p class="text-wrap">The golden rules...</p>
                                            </td>
                                            <td>
                                                <p class="text-wrap">Lorem ipsum dolor sit... </p>
                                            </td>
                                            <td>
                                                <p class="text-wrap">Umesh Jaiswar </p>
                                            </td>
                                            <td>
                                                <p class="text-wrap">2021-03-17</p>
                                            </td>
                                            <td>
                                                <a href="">
                                                    <button type="button" class="btn btn-gradient-warning btn-sm"><i class="mdi mdi-pencil"></i></button>
                                                </a>
                                                <a href="">
                                                    <button type="button" class="btn btn-gradient-danger btn-sm"><i class="mdi mdi-delete"></i></button>
                                                </a>
                                            </td>
                                        </tr> -->

                                        <?php

                                        $query = mysqli_query($conn, "SELECT * FROM `subscribe` WHERE `deleted_at` is null");
                                        if ($query->num_rows > 0) {
                                            $i = 1;
                                            while ($data = mysqli_fetch_assoc($query)) {
                                                // print_r($data);

                                        ?>
                                                <tr>
                                                    <td> <?php echo $i++; ?></td>
                                                    <td> <?php echo $data['email']; ?> </td>
                                                    
                                                    <td>
                                                        <p class="text-wrap"><?php echo $data['updated_at']; ?></p>
                                                    </td>
                                                    
                                                </tr>
                                        <?php
                                            }
                                        }

                                        ?>

                                    </tbody>
                                </table>
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
        <!-- endinject -->
        <!-- Custom js for this page -->
        <!-- End custom js for this page -->

        <!-- datatable cdn  -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable();
            });
        </script>
</body>

</html>