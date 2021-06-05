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
        $sorgumetni="Select * From magazalar ";
        //$sth1 = $con->prepare($sorgumetni);
        //$sth1->execute();
        //$result1 = $sth1->fetch(PDO::FETCH_OBJ);
        $sorgumetni2="SELECT personeller.ad as PersAd, magazalar.id as MagazaId , personeller.soyad, personeller.tel, personeller.mail, magazalar.ad, magazalar.id FROM personeller INNER JOIN magazalar on personeller.magazaId=magazalar.id  where personeller.id=".$id;
        $sth = $con->prepare($sorgumetni2);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ);
        $ad = $result->PersAd;
        $soyad = $result ->soyad;
        $tel = $result ->tel;
        $mail = $result ->mail;
        $magaza = $result->ad;
        $magazaid = $result->MagazaId
        ?>
    <label for="Ad"><b>Personel Adı</b></label>
    <input type="text"  name="ad" id="ad" value="<?php echo $ad ?>" required>

    <label for="Soyad"><b>Personel Soyad</b></label>
    <input type="text" name="soyad" id="soyad" value="<?php echo $soyad ?> "required>
    
    <label for="Mail"><b>Personel Mail Adresi</b></label>
    <input type="text" name="mail" id="mail" value="<?php echo $mail ?>" required>

    <label for="Telefon"><b>Personel Telefon Numarası</b></label>
    <input type="text" name="telno" id="telno" value="<?php echo $tel ?>" required> 

    <label for="Magaza"><b>Personel Mağazası</b></label>
    <select name="magaza" id="Magaza" >
        <?php
        foreach($con->query($sorgumetni) as $row)
        {
            
            echo '<option value="'.$row["id"].'"';
            if ($magazaid == $row["id"])
            {
                echo 'selected >'.$row["ad"].'</option>';
            }
            else{
                echo '>'.$row["ad"].'</option>';
            }
            
        }
        ?>
    </select>
    <button type="submit" class="registerbtn">Personel Güncelle</button>
    <input type="button" class="geribtn" onclick="history.go(-1);" value="Geri Dön"></input>
    </form>
  </div>
    <?php
    if($_POST){
        $guncelad=$_POST["ad"];
        $guncelsoyad=$_POST["soyad"];
        $guncelmail=$_POST["mail"];
        $gunceltel=$_POST["telno"];
        $guncelmagaza=$_POST["magaza"];

        $guncelle = "UPDATE personeller SET id = '".$id."' , ad = '".$guncelad."' , soyad = '".$guncelsoyad."' , tel = '".$gunceltel."' , mail = '".$guncelmail."' , magazaId = '".$guncelmagaza."' WHERE id = ".$id;
        //var_dump($guncelle);
        $con->exec($guncelle);
        header('Location:personeller.php');
    }
  ?>
</html>