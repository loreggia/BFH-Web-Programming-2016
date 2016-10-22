<?php
$loginUser = $_POST['loginUser'];
if ($loginUser == "admin") {
    header("Location: ./../admin.php");
    die();
} else {
    header("Location: ./../");
    die();
}
