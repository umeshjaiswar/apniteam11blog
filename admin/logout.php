<?php
include('constant.php');
session_start();
session_unset();

header("Location: ".$base_url."index.php");
?>