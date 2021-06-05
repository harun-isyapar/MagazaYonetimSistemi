<html>
    <link rel="stylesheet" href="stokekle.css">
<title>Stok Güncelle</title>
<div class="anakutu">
    <form action="" method="POST">
    <h1>Stok Güncelle</h1>
    <?php 
        $username='root';
        $pswrd='';
        $cekid=$_GET["id"];
        $con=new PDO('mysql:host=localhost;dbname=magazayonetimsistemi',$username,$pswrd);
        $sorgumetni="Select * From magazalar";
        $sorgumetni2="Select * From urunler";
        $sorgumetni3="Select * From urunmagaza WHERE id=".$cekid;
        $sth = $con->prepare($sorgumetni3);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ);
        $urunid = $result->urunid;
        $magazaid = $result ->magazaid;
        $stok = $result ->stok;
        ?>
    <label for="Magaza" style="float:left"><b>Stok Girişi yapılacak Mağaza</b></label>
    <select name="magaza" id="magaza">
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
    <label for="urun" style="float:left"><b>Stok Girişi yapılacak Ürün</b></label>
    <select name="urun" id="urun">
        <?php
        foreach($con->query($sorgumetni2) as $row)
        {
            echo '<option value="'.$row["id"].'"';
            if ($urunid == $row["id"])
            {
                echo 'selected >'.$row["ad"].'-'.$row["aciklama"].'</option>';
            }
            else{
                echo '>'.$row["ad"].'-'.$row["aciklama"].'</option>';
            }
        }
        ?>
    </select>
    <label style="float:left" for="Ad"><b>Stok Sayısı</b></label>
    <input type="text" placeholder="Stok Sayısı Giriniz" name="stok" id="stok" value="<?php echo $stok  ?>" required>

    <button type="submit" class="registerbtn">Stok Ekle</button>
    <input type="button" class="geribtn" onclick="javascript:history.back()" value="Geri Dön"></input>
    </form>
  </div>
    <?php
    if($_POST){
        $gelenMagaza= $_POST["magaza"];
        $gelenUrun= $_POST["urun"];
        $gelenStok= $_POST["stok"];

        $guncelle = "UPDATE urunmagaza SET urunid = '".$gelenUrun."' , magazaid = '".$gelenMagaza."' , stok = '".$gelenStok."' WHERE id=".$cekid;
        //var_dump($guncelle);
        $con->exec($guncelle);
        header("location:urunler.php");
    }
  ?>
</html>