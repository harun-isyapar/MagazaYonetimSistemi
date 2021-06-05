<html>
    <link rel="stylesheet" href="personelekle.css">
<title>Ürün Ekle</title>
<div class="anakutu">
    <form action="" method="POST">
    <h1>Ürün Ekle</h1>
    <?php 
        $username='root';
        $pswrd='';
        $con=new PDO('mysql:host=localhost;dbname=magazayonetimsistemi',$username,$pswrd);
        ?>
    <label for="Ad"><b>Ürün Adı</b></label>
    <input type="text" placeholder="Ürün Adını Giriniz" name="ad" id="ad" required>

    <label for="Soyad"><b>Ürün Açıklaması</b></label>
    <input type="text" placeholder="Ürün Açıklaması Giriniz" name="aciklama" id="soyad" required>

    
    <button type="submit" class="registerbtn">Ürün Ekle</button>
    <input type="button" class="geribtn" onclick="location.href='urunler.php';" value="Geri Dön"></input>
    </form>
  </div>
    <?php
    if($_POST){
        $gelenAd    = $_POST["ad"];
        $gelenAciklama = $_POST["aciklama"];
        
        $kayit = "INSERT INTO urunler (ad,aciklama) VALUES ('".$gelenAd."','".$gelenAciklama."')";
        $con->exec($kayit);
        header('Location:urunler.php');
    }
  ?>
</html>