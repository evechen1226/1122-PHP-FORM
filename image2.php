<img src="./imgs/" alt="">
<?php

/****
 * 1.建立資料庫及資料表
 * 2.建立上傳圖案機制
 * 3.取得圖檔資源
 * 4.進行圖形處理
 *   ->圖形縮放
 *   ->圖形加邊框
 *   ->圖形驗證碼
 * 5.輸出檔案
 */

if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], './imgs/' . $_FILES['img']['name']);

    $source_path = "./imgs/". $_FILES['img']['name'];

    $type = $_FILES['img']['type'];

    switch ($type) {
        case 'image/jpeg':
            $source = imagecreatefromjpeg($source_path);
            list($width, $height) = getimagesize(($source_path));
            break;
        case 'image/png':
            $source = imagecreatefrompng($source_path);
            list($width, $height) = getimagesize(($source_path));
            break;
        case 'image/gif':
            $source = imagecreatefromgif($source_path);
            list($width, $height) = getimagesize(($source_path));
            break;
        case 'image/bmp':
            $source = imagecreatefrombmp($source_path);
            list($width, $height) = getimagesize(($source_path));

            break;
    }
    $dst_path = './imgs/border_' . $_FILES['img']['name'];
    $dst_width = 300;
    $dst_height = 300;
    $dst_source = imagecreatetruecolor($dst_width, $dst_height);
    $border = 30;
    $white=imagecolorallocate($dst_source,255,255,255);
    $LemonChiffon=imagecolorallocate($dst_source,255,250,205);
    imagefill($dst_source,0,0,$white);
    //判斷方向
    if ($width == $height) {
        $scale =   ($dst_width - ($border * 2))/$width;
        $dst_x = $border;
        $dst_y = $border;
    } else if ($width < $height) {
        //直向
        $scale =  ($dst_width - ($border * 2))/ $height;
        $new_width=$width*$scale;
        $new_height=$height*$scale;
        $dst_x = floor($dst_width-$new_width)/2;
        $dst_y=$border;
    } else {
        //橫向
        $scale =   ($dst_width - ($border * 2))/$width;
        $new_width=$width*$scale;
        $new_height=$height*$scale;
        $dst_x=$border;
        $dst_y = floor($dst_width-$new_height)/2;
    }

    imagecopyresampled($dst_source, $source, $dst_x, $dst_y, 0, 0, $new_width, $new_height, $width, $height);
    switch ($type) {
        case 'image/jpeg':
            imagejpeg($dst_source, $dst_path);
            break;
        case 'image/png':
            imagepng($dst_source, $dst_path);

            break;
        case 'image/gif':
            imagegif($dst_source, $dst_path);

            break;
        case 'image/bmp':
            imagebmp($dst_source, $dst_path);
            break;
    }
    imagedestroy(($source));
    imagedestroy(($dst_source));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>圖形檔案處理</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1 class="header">圖形處理練習</h1>
    <!---建立檔案上傳機制--->
    <form action="?" method="post" enctype="multipart/form-data">
        <label for="">選取檔案</label>
        <input type="file" name="img" id="">
        <input type="submit" id="" value="上傳">
    </form>


    <!----縮放圖形----->
    <img src="<?= $dst_path; ?>" alt="">

    <!----圖形加邊框----->


    <!----產生圖形驗證碼----->



</body>

</html>