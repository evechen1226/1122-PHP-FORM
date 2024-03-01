<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP的檔案處理</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            display: flex;
            margin-top: 20px;
            justify-content: center;
        }
        .box{
            margin: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box"><a href="upload.php">
                <div class="types">表單檔案上傳</div>
            </a>
            <a href="manage.php">
                <div class="types">檔案管理</div>
            </a>
            <a href="text-import.php">
                <div class="types">文字檔案處理-CSV</div>
            </a>
            <a href="text-export.php">
                <div class="types">文字檔案處理-CSV匯入資料庫</div>
            </a>
        </div>
        
        <div class="box"> <a href="image2.php">
            <a href="image.php">
                <div class="types">圖形處理</div>
            </a>
                <div class="types">圖形處理-加邊框</div>
            </a>
            <a href="filelist.php">
                <div class="types">使用php函式獲取資料夾目錄內容</div>
            </a>
            <a href="captcha.php">
                <div class="types">圖型驗證碼</div>
            </a>
        </div>

    </div>

</body>

</html>