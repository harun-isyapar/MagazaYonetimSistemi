<html>
    <link rel="stylesheet" href="personelekle.css">
<title>Personel Güncelle</title>
<div class="anakutu">
    <form action="" method="POST">
    <h1>Personel Güncelle</h1>
    <?php 
        $username='root';
        $pswrd='';
        $con=new PDO('mysql:host=localhost;dbname=magazayonetimsistemi',$username,$pswrd);
        $id=$_GET['id'];
        //$sth1 = $con->prepare($sorgumetni);
        //$sth1->execute();
        //$result1 = $sth1->fetch(PDO::FETCH_OBJ);
        $sorgumetni2="SELECT * FROM magazalar where id=".$id;
        $sth = $con->prepare($sorgumetni2);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ);
        $ad = $result->ad;
        $il = $result ->il;
        $ilce = $result ->ilce;
        $tel = $result ->tel;
        $mail = $result ->mail;
        $adres = $result->acikadres;
        ?>
    <label for="Ad"><b>Mağaza Adı</b></label>
    <input type="text"  name="ad" id="ad" value="<?php echo $ad ?>" required>

    <label for="Soyad"><b>İl</b></label>
    <input type="text" name="il" id="il" value="<?php echo $il ?> "required>
    
    <label for="Mail"><b>İlçe</b></label>
    <input type="text" name="ilce" id="ilce" value="<?php echo $ilce ?>" required>

    <label for="Telefon"><b>Mail Adresi</b></label>
    <input type="text" name="mail" id="mail" value="<?php echo $mail ?>" required> 

    <label for="Telefon"><b>Telefon Numarası</b></label>
    <input type="text" name="tel" id="tel" value="<?php echo $tel ?>" required> 

    <label for="Telefon"><b>Açık Adres</b></label>
    <input type="text" name="adres" id="adres" value="<?php echo $adres ?>" required> 

    <button type="submit" class="registerbtn">Personel Güncelle</button>
    <input type="button" class="geribtn" onclick="history.go(-1);" value="Geri Dön"></input>
    </form>
  </div>
    <?php
    if($_POST){
        $guncelad=$_POST["ad"];
        $guncelil=$_POST["il"];
        $guncelilce=$_POST["ilce"];
        $guncelmail=$_POST["mail"];
        $gunceltel=$_POST["tel"];
        $gunceladres=$_POST["adres"];
        $guncelle = "UPDATE magazalar SET id = '".$id."' , ad = '".$guncelad."' , il = '".$guncelil."', ilce = '".$guncelilce."' , tel = '".$gunceltel."' , mail = '".$guncelmail."' , acikadres = '".$gunceladres."' WHERE id = ".$id;
        //var_dump($guncelle);
        $con->exec($guncelle);
        header('Location:personeller.php');
    }
  ?>
</html>