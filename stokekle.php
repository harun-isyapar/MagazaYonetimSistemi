<html>
    <link rel="stylesheet" href="stokekle.css">
<title>Stok Ekle</title>
<div class="anakutu">
    <form action="" method="POST">
    <h1>Stok Ekle</h1>
    <?php 
        $username='root';
        $pswrd='';
        $con=new PDO('mysql:host=localhost;dbname=magazayonetimsistemi',$username,$pswrd);
        $sorgumetni="Select * From magazalar";
        $sorgumetni2="Select * From urunler";

        ?>
    <label for="Magaza" style="float:left"><b>Stok Girişi yapılacak Mağaza</b></label>
    <select name="magaza" id="Magaza">
        <?php
        foreach($con->query($sorgumetni) as $row)
        {
            echo '<option value="'.$row["id"].'" >'.$row["ad"].'</option>';
        }
        ?>
    </select>
    <label for="urun" style="float:left"><b>Stok Girişi yapılacak Ürün</b></label>
    <select name="urun" id="urun">
        <?php
        foreach($con->query($sorgumetni2) as $row)
        {
            echo '<option value="'.$row["id"].'" >'.$row["ad"].'-'.$row["aciklama"].'</option>';
        }
        ?>
    </select>
    <label style="float:left" for="Ad"><b>Stok Sayısı</b></label>
    <input type="text" placeholder="Stok Sayısı Giriniz" name="stok" id="stok" required>

    <button type="submit" class="registerbtn">Stok Ekle</button>
    <input type="button" class="geribtn" onclick="javascript:history.back()" value="Geri Dön"></input>
    </form>
  </div>
    <?php
    if($_POST){
        $gelenMagaza= $_POST["magaza"];
        $gelenUrun= $_POST["urun"];
        $gelenStok= $_POST["stok"];

        $kayit = "INSERT INTO urunmagaza (urunid,magazaid,stok) VALUES ('".$gelenUrun."','".$gelenMagaza."','".$gelenStok."')";
        $con->exec($kayit);
        header("location:urunler.php");
    }
  ?>
</html>