<html>
<link rel="stylesheet" href="urundetay.css">
<title>Mağaza Stokları</title>
<table id="stores">
<thead>
            <tr style="text-align:center">
                
                <th>Ürün Adı</th>
                <th>Ürün Açıklaması</th>
                <th>Ürün Stoğu</th>
                <th>Stoğu Güncelle</th>
                <th>Stoğu Sil</th>
            </tr>
            
</thead>
<?php 
        $username='root';
        $pswrd='';
        $con=new PDO('mysql:host=localhost;dbname=magazayonetimsistemi',$username,$pswrd);
        $id=$_GET['id'];
        $sorgumetni="Select urunmagaza.id, urunler.aciklama, urunler.ad, urunmagaza.stok From urunmagaza INNER JOIN urunler ON urunmagaza.urunid=urunler.id INNER JOIN magazalar ON urunmagaza.magazaid=magazalar.id WHERE urunmagaza.magazaid=".$id;
        foreach($con->query($sorgumetni)as $row)
        {
        echo'
        <tr>
        <td>'.$row["ad"].'</td>
        <td>'.$row["aciklama"].'</td>
        <td>'.$row["stok"].'</td>
        <td><a href="stokguncelle.php?id='.$row["id"].'">Stoğu Güncelle</a></td>
        <td><a href="stoksil.php?id='.$row["id"].'">Stoğu Sil</a></td>
        </tr>
        ';
        }
        ?>
</table>
<a href="magazalar.php"><div class="logo"><img src="icons/return.png" />Geri Dön</div></a>
<a href="stokekle.php"><div class="logo" style="margin-left:15px"><img src="icons/add-product.png" />Stok Ekle</div></a>
</html>