<?php 
$username='root';
$pswrd='';
$con=new PDO('mysql:host=localhost;dbname=magazayonetimsistemi',$username,$pswrd);
$id=$_GET['id'];
$sorgu="DELETE from urunler WHERE id=".$id;
$con->exec($sorgu);
header('Location:urunler.php');
?>