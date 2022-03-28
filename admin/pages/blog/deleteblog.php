<?php
include('../../constant.php');
session_start();
$id = $_GET['id'];
$date = date('Y-m-d H:i:s');
$delete = mysqli_query($conn, "UPDATE `blog` SET `deleted_at`='$date' WHERE `id` = '$id'");
if ($delete) {
    // echo "Blog Deleted";
    header("Location: index.php");
    $_SESSION['success'] = "Blog Deleted Successfully";

} else {
    // echo "Error: " . mysqli_errno($conn);
    $_SESSION['error'] = "Error: " . mysqli_errno($conn);
}
