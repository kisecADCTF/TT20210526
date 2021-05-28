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
/*
    $file = $_FILES['uploadfile'];
$filefile = Mid($file, inStrRev($file,".")+1,3)
$filefile = Lcase($filefile)

/*    if(preg_match("/php/i",$file['name'])){//php가 들어가있는 파일 확인
        echo "php사용금지";
        exit;
    }

    If 0 < Instr($filefile,"bmp") then
elseif 0 < Instr($filefile,"gif") then
elseif 0 < Instr($filefile,"jpg") then
else
    echo "허용 불가능한 파일입니다.";
Response.Write("<script>location.href('http://10.10.0.142:30601/bbs/board.php?board_ID=2')</script>")
*/

    $file = $_FILES['uploadfile'];

    $tmp = explode('.',$file);
    $ext =$tmp[1];
    if($ext != 'jpg'||'jpeg'||'txt'){
        echo "차단";
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
