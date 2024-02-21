<h2>資料夾imgs內容</h2>
<?php
$dir = './imgs';
$files = scandir($dir);
$fileStr = 'change';
echo "<ol>";
if (!empty($files)) {
    foreach ($files as $idx=> $file) {
        
        if (str_contains($file, 'border') && is_file($dir . "/" . $file)) {
            $ext=explode(".",$file)[1];
            $flieName = 'border_' . $fileStr . sprintf('%04d', $idx + 1).".".$ext;
            rename($dir."/".$file,$dir."/".$flieName);
            echo "<li>";
            echo "<img src='$dir/$flieName'>";
            echo $flieName;
            echo "</li>";
        }
    }
}
echo "</ol>";
?>