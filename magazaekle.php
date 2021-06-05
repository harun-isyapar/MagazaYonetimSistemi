<html>
    <link rel="stylesheet" href="magazaekle.css">
<title>Mağaza Ekle</title>
<div class="anakutu">
    <form action="" method="POST">
    <h1>Mağaza Ekle</h1>
    <?php 
        $username='root';
        $pswrd='';
        $con=new PDO('mysql:host=localhost;dbname=magazayonetimsistemi',$username,$pswrd);
        
        ?>
    <label for="Ad"><b>Mağaza Adı</b></label>
    <input type="text" placeholder="Mağazanın Adını Giriniz" name="ad" id="ad" required>

    <label for="Soyad"><b>İl</b></label>
    <input type="text" placeholder="Mağazanın İlini Giriniz" name="il" id="il" required>

    <label for="Soyad"><b>İlçe</b></label>
    <input type="text" placeholder="Mağazanın İlcesini Giriniz" name="ilce" id="ilce" required>
    
    <label for="Mail"><b>Mail Adresi</b></label>
    <input type="text" placeholder="Mağazanın Mail Adresini Giriniz" name="mail" id="mail" required>

    <label for="Telefon"><b>Telefon Numarası</b></label>
    <input type="text" placeholder="Mağazanın Telefon Numarasını Giriniz" name="telno" id="telno" required>

    <label for="Telefon"><b>Açık Adres</b></label>
    <input type="text" placeholder="Mağazanın Açık Adresini Giriniz" name="aadres" id="aadres" required>
    <button type="submit" class="registerbtn">Mağaza Ekle</button>
    <input type="button" class="geribtn" onclick="location.href='magazalar.php';" value="Geri Dön"></input>
    </form>
  </div>
    <?php
    if($_POST){
        $gelenAd    = $_POST["ad"];
        $gelenil = $_POST["il"];
        $gelenilce  = $_POST["ilce"];
        $gelenmail    = $_POST["mail"];
        $gelentel    = $_POST["telno"];
        $gelenaadres = $_POST["aadres"];
        
        $kayit = "INSERT INTO magazalar (ad,il,ilce,tel,mail,acikadres) VALUES ('".$gelenAd."','".$gelenil."','".$gelenilce."','".$gelentel."','".$gelenmail."','".$gelenaadres."')";
        $con->exec($kayit);
        //var_dump($kayit);
        header('Location:magazalar.php');
    }
  ?>
</html>