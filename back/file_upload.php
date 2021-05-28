<html>
    <head>
        <title>File Upload</title>
    </head>
    <body>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="file" name="uploadfile" />
            <input type="submit" name="upload" value="upload" />
        </form>
    </body>
</html>
<?php

    $file = $_FILES['uploadfile'];
    if(preg_match("/php/i",$file)){//php가 들어가있는 파일 확인
        echo "php사용금지";
        exit;
    }

    echo $file['name'] ."<br/>";
    echo $file['tmp_name'] ."<br/>";
    $path = "./upload/";
    if($_POST['upload'] == "upload")
    {
        if(move_uploaded_file($file['tmp_name'], $path . $file['name']))
            echo "Upload success";
        else
            echo "Upload fail";
    }
?>
