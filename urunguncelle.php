<html>
    <link rel="stylesheet" href="personelekle.css">
<title>Ürün Güncelle</title>
<div class="anakutu">
    <form action="" method="POST">
    <h1>Ürün Güncelle</h1>
    <?php 
        $username='root';
        $pswrd='';
        $con=new PDO('mysql:host=localhost;dbname=magazayonetimsistemi',$username,$pswrd);
        $id=$_GET['id'];
        $sorgumetni="Select * From magazalar ";
        //$sth1 = $con->prepare($sorgumetni);
        //$sth1->execute();
        //$result1 = $sth1->fetch(PDO::FETCH_OBJ);
        $sorgumetni2="SELECT * FROM urunler where id=".$id;
        $sth = $con->prepare($sorgumetni2);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ);
        $ad = $result->ad;
        $aciklama = $result ->aciklama;
        ?>
    <label for="Ad"><b>Ürün Adı</b></label>
    <input type="text"  name="ad" id="ad" value='<?php echo $ad ?>' required>

    <label for="Soyad"><b>Ürün Açıklaması</b></label>
    <input type="text" name="aciklama" id="aciklama" value='<?php echo $aciklama ?>'required>
    
    <button type="submit" class="registerbtn">Ürünü Güncelle</button>
    <input type="button" class="geribtn" onclick="history.go(-1);" value="Geri Dön"></input>
    </form>
  </div>
    <?php
    if($_POST){
        $guncelad=$_POST["ad"];
        $guncelaciklama=$_POST["aciklama"];
        $guncelle = "UPDATE urunler SET id = '".$id."' , ad = '".$guncelad."' , aciklama = '".$guncelaciklama."' WHERE id = ".$id;
        //var_dump($guncelle);
        $con->exec($guncelle);
        header('Location:urunler.php');
    }
  ?>
</html>