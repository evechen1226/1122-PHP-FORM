<?php
/**
 * 1.建立表單
 * 2.建立處理檔案程式
 * 3.搬移檔案
 * 4.顯示檔案列表
 */
include_once "./db.php";
$file=find('files',$_GET['id'])
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>編輯檔案</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
 <h1 class="header">編輯檔案</h1>
 <!----建立你的表單及設定編碼----->
 <?php

if(isset($_GET['err'])){
    echo $_GET['err'];
}

?>
<form action="./api/edit_file.php" method="post" enctype="multipart/form-data">

<input type="file" name="img" id="">
<input type="text" name="name" value="">
<input type="text" name="desc" value="描述">
<input type="submit" value="更新">
</form>




<!----建立一個連結來查看上傳後的圖檔---->  
<?php

if(isset($_GET['img'])){
    echo "<img src='./imgs/{$_GET['img']}' style='width:250px;height:150px'>";
}

?>

</body>
</html>