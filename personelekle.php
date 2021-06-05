<html>
    <link rel="stylesheet" href="personelekle.css">
<title>Personel Ekle</title>
<div class="anakutu">
    <form action="" method="POST">
    <h1>Personel Ekle</h1>
    <?php 
        $username='root';
        $pswrd='';
        $con=new PDO('mysql:host=localhost;dbname=magazayonetimsistemi',$username,$pswrd);
        $sorgumetni="Select * From magazalar"; 
        ?>
    <label for="Ad"><b>Personel Adı</b></label>
    <input type="text" placeholder="Personel Adını Giriniz" name="ad" id="ad" required>

    <label for="Soyad"><b>Personel Soyad</b></label>
    <input type="text" placeholder="Personel Soyadını Giriniz" name="soyad" id="soyad" required>
    
    <label for="Mail"><b>Personel Mail Adresi</b></label>
    <input type="text" placeholder="Personel Mail Adresini Giriniz" name="mail" id="mail" required>

    <label for="Telefon"><b>Personel Telefon Numarası</b></label>
    <input type="text" placeholder="Personel Telefon Numarasını Giriniz" name="telno" id="telno" required> 

    <label for="Magaza"><b>Personel Mağazası</b></label>
    <select name="magaza" id="Magaza">
        <?php
        foreach($con->query($sorgumetni) as $row)
        {
            echo '<option value="'.$row["id"].'" >'.$row["ad"].'</option>';
        }
        ?>
    </select>
    <button type="submit" class="registerbtn">Personel Ekle</button>
    <input type="button" class="geribtn" onclick="location.href='personeller.php';" value="Geri Dön"></input>
    </form>
  </div>
    <?php
    if($_POST){
        $gelenAd    = $_POST["ad"];
        $gelenSoyad = $_POST["soyad"];
        $gelenMail  = $_POST["mail"];
        $gelenTel    = $_POST["telno"];
        $gelenMagaza= $_POST["magaza"];
        
        $kayit = "INSERT INTO personeller (ad,soyad,tel,mail,magazaId) VALUES ('".$gelenAd."','".$gelenSoyad."','".$gelenTel."','".$gelenMail."','".$gelenMagaza."')";
        $con->exec($kayit);
        header('Location:personeller.php');
    }
  ?>
</html>