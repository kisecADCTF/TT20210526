<?php

include('utils/constants.php');
include('utils/connect.php');

if (!isset($_POST['submit']))
    exit('Illegal call to this page.');

$username = $_POST['username'];
$username = addslashes($username);
$password = MD5($_POST['password']);
$permission = $_POST['permission'];
$permission = addslashes($permission);
if($username < 5){
    echo "<script>alert('아이디 5글자이상');</script>";
    exit;
}
else if ($password < 8){
    echo "<script>alert('비밀번호 8자 이상');</script>";
    exit;
}

$now = date('Y-m-d H:i:s', time());
$query = "INSERT INTO user(username, password, default_permission, registration_time, money) ";
$query .= "VALUES('$username', '$password', '$permission', '$now', 10000)";

mysqli_query($conn, $query) or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<script>
    alert("Registered completed.");
    window.location.href = "index.html";
</script>
