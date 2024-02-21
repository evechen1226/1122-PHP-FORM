<h2>資料夾imgs內容</h2>
<?php
$dir = './imgs';
$files = scandir($dir);
$fileStr = 'chanbger';
echo "<ol>";
if (!empty($fles)) {
    foreach ($files as $file) {
        if (str_contains($file, 'border' && is_file($dir . "/" . $flie))) {
            $ext=explode(".",$file)[1];
            $flieName = 'border_' . $fileStr . sprintf('%04d', $idx + 1);
            rename($dir."/".$flie."/",$flieName);
            echo "<li>";
            echo "<img src='$dir/$flieName'>";
            echo $flieName;
            echo "</li>";
        }
    }
}
echo "</ol>";
?>