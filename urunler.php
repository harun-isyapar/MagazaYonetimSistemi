<html>
<link rel="stylesheet" href="urunler.css">

<head>
    <title>Ürünler</title>
</head>
<body>
<table id="customers">
<thead>
            <tr style="text-align:center">
                <th>ID</th>
                <th>Adı</th>
                <th>Açıklama</th>
                <th>Stokları Görüntüle</th>
                <th>Ürünü Sil</th>
                <th>Ürünü Güncelle</th>

            </tr>
        </thead>
    <?php 
        $username='root';
        $pswrd='';
        $con=new PDO('mysql:host=localhost;dbname=magazayonetimsistemi',$username,$pswrd);
        $sorgumetni="Select * From urunler";
        foreach($con->query($sorgumetni)as $row)
        {
        echo'
        <tr>
        <td>'.$row["id"].'</td>
        <td>'.$row["ad"].'</td>
        <td>'.$row["aciklama"].'</td>
        <td><a href="urundetay.php?id='.$row["id"].'">Stokları Görüntüle</a></td>
        <td><a href="urunsil.php?id='.$row["id"].'">Sil</a></td>
        <td><a href="urunguncelle.php?id='.$row["id"].'">Güncelle</a></td>
        </tr>
        ';
        }
        ?>
    </tr>
</table>
<a href="index.php"><div class="logo"><img src="icons/return.png" />Geri Dön</div></a>
<a href="urunekle.php"><div class="logo" style="margin-left:15px"><img src="icons/add-product.png" />Urun Ekle</div></a>
</body>
</html>