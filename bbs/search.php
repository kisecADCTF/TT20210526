<?php
include("../utils/constants.php");
include("../utils/connect.php");
include("../utils/general.php");

$search = $_GET['search'];

$sql= "select * from post where post_name like '%$search%' order by post_ID desc";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if(!empty($result)){
    $cnt = 0;
    while ($row = mysqli_fetch_array($result))
    {
        if(isset($row))
        {
            $cnt++;
            $post_ID = $row['post_ID'];
            $post_name = $row['post_name'];
            $author_ID = $row['user_ID'];
            $post_link = "<a href='post.php?post_ID=$post_ID'>$post_name</a>";
            echo <<< EOT
            <p><h5>
                $post_link
            </h5></p>
EOT;
        }
    }
    if($cnt == 0)
    {
        echo "찾을 수 없습니다";
    }
}

