<style>
    table{
        border-collapse: collapse;
    }
    td{
        border:1px solid #666;
        padding:5px 12px;
    }
    th{
        border:1px solid #666;
        padding:5px 12px;
        background-color: black;
        color:white;
    }
</style>
<?php

/****
 * 1.建立資料庫及資料表
 * 2.建立上傳檔案機制
 * 3.取得檔案資源
 * 4.取得檔案內容
 * 5.建立SQL語法
 * 6.寫入資料庫
 * 7.結束檔案
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文字檔案匯入</title>
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap 5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <h1 class="header">文字檔案匯入練習</h1>
    <!---建立檔案上傳機制--->

    <div class="container">
        <form class="" action="?" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-10">
                    <input class="form-control" type="file" name="text" id="text">
                </div>
                <div class="col-2">
                    <input class="btn btn-primary" type="submit" value="送出">
                </div>

            </div>
        </form>
    </div>


    <!----讀出匯入完成的資料----->
    <div class="container">
        <?php
        if (!empty($_FILES['text']['tmp_name'])) {
            $filename = $_FILES['text']['name'];
            $filesize = $_FILES['text']['size'];
            echo "檔案上傳成功!檔名為" . $filename;
            echo "<br> 檔案大小：" . $filesize;
            $file = fopen($_FILES['text']['tmp_name'], 'r');

            // function text($file)
            // {
            //   echo "<br> 123----" . fgets($file);
            // }

            //fgets() 會一直遞增執行，不會因位置不同而重新開始，以指令出現次數為主。

            //第一次執行：標題
            $line = fgets($file);
            echo "<br> 123---" . $line;

            //第二次執行：列1661
            // $line = fgets($file);
            // echo "<br> 456---" . $line;

            echo "<table class='table table-striped table-hover px-3'>";
            $cols = explode(",", $line);

            echo "<thead>";
            echo "<tr>";
            foreach ($cols as $col) {
                echo "<th>";
                echo $col;
                echo "</th>";
            }
            echo "</tr>";
            echo "</thead>";

            echo "<tbody>";
            while (!feof($file)) {
                $line = fgets($file);
                $cols = explode(",", $line);
                echo "<tr>";
                foreach ($cols as $col) {
                    echo "<td>";
                    echo $col;
                    echo "</td>";
                }
                echo "</tr>";
            }
            echo "</tbody>";

            echo "</table>";
        }

        ?>
    </div>
</body>

</html>