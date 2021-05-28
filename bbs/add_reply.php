<?php

include('../utils/constants.php');
include('../utils/connect.php');
include('../utils/general.php');

if (!isset($_POST['submit']))
	exit('Illegal call to this page.');
$NO = array("/</","/>/");
$YES = array("&lt","&gt");
$post_ID = $_POST['post_ID'];
$post_ID=preg_replace($NO,$YES,$post_ID);

$board_ID = GetBoardID($post_ID);
$user_ID = $_SESSION['user_ID'];
$user_ID=preg_replace($NO,$YES,$user_ID);
$permission = GetPermission($user_ID, $board_ID);
if ($permission < PERM_USER)
	exit('Not enough permission.');

$content = $_POST['content'];
$content=preg_replace($NO,$YES,$content);
$now = date('Y-m-d H:i:s', time());
$query = "INSERT INTO post_reply(user_ID, post_ID, create_time, content) ";
$query .= "VALUES ('$user_ID', '$post_ID', '$now', '$content')";
mysqli_query($conn, $query) or die(mysqli_error($conn));

$query = "UPDATE post SET last_update = '$now' WHERE post_ID = '$post_ID'";
mysqli_query($conn, $query) or die(mysqli_error($conn));

header("location:post.php?post_ID=$post_ID");
?>


