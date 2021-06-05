<html>
<link rel="stylesheet" href="magazalar.css">

<head>
    <title>Mağazalar</title>
</head>
<body>
<table id="customers">
<thead>
            <tr style="text-align:center">
                <th>ID</th>
                <th>Adı</th>
                <th>İl</th>
                <th>İlçe</th>
                <th>Telefon Numarası</th>
                <th>Mail Adresi</th>
                <th>Açık Adresi</th>
                <th>Personeller</th>
                <th>Ürünler</th>
                <th>Sil</th>
                <th>Güncelle</th>
            </tr>
        </thead>
    <?php 
        $username='root';
        $pswrd='';
        $con=new PDO('mysql:host=localhost;dbname=magazayonetimsistemi',$username,$pswrd);
        $sorgumetni="Select * From magazalar";
        foreach($con->query($sorgumetni)as $row)
        {
        echo'
        <tr>
        <td>'.$row["id"].'</td>
        <td>'.$row["ad"].'</td>
        <td>'.$row["il"].'</td>
        <td>'.$row["ilce"].'</td>
        <td>'.$row["tel"].'</td>
        <td>'.$row["mail"].'</td>
        <td>'.$row["acikadres"].'</td>
        <td><a href="magazapersonel.php?id='.$row["id"].'">Personellere Git</a></td>
        <td><a href="magazaurun.php?id='.$row["id"].'">Ürünlere Git</a></td>
        <td><a href="magazasil.php?id='.$row["id"].'">Mağazayı Sil</a></td>
        <td><a href="magazaguncelle.php?id='.$row["id"].'">Mağazayı Güncelle</a></td>
        </tr>
        ';
        }
        ?>
    </tr>
</table>
<a href="index.php"><div class="logo"><img src="icons/return.png" />Geri Dön</div></a>
<a href="magazaekle.php"><div class="logo" style="margin-left:15px"><img src="icons/add-store.png" />Mağaza Ekle</div></a>
</body>
</html>