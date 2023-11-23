<?php
include_once "../db.php";

$id=$_GET['id'];
$file=find('files',$id)['name'];

del('files',$id);

unlink('../imgs/'.$id);

header('location:../manage.php');
?>
