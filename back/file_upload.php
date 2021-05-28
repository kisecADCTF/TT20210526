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
    $ext = explode(".",strtolower($file));//.을 기준으로 확장자 확인

    $cnt = count($ext)-1;
    if($ext[$cnt] === ""){
        if(@ereg($ext[$cnt-1], "php|php3|php4|htm|inc|html")){
            echo "차단";
            exit;
        }
    } else if(@ereg($ext[$cnt], "php|php3|php4|htm|inc|html")){
        echo 차단;
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
