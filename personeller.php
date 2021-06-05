<html>
<link rel="stylesheet" href="personeller.css">

<head>
    <title>Personeller</title>
</head>
<body>
<table id="customers">
<thead>
            <tr style="text-align:center">
                <th>ID</th>
                <th>Personel Ad</th>
                <th>Personel Soyad</th>
                <th>Detay</th>
            </tr>
        </thead>
    <?php 
        $username='root';
        $pswrd='';
        $con=new PDO('mysql:host=localhost;dbname=magazayonetimsistemi',$username,$pswrd);
        $sorgumetni="Select * From personeller";
        foreach($con->query($sorgumetni)as $row)
        {
        echo'
        <tr>
        <td>'.$row["id"].'</td>
        <td>'.$row["ad"].'</td>
        <td>'.$row["soyad"].'</td>
        <td><a href="personeldetay.php?id='.$row["id"].'">Detaya Git</a></td>
        </tr>
        ';
        }
        ?>
    </tr>
</table>
<a href="index.php"><div class="logo"><img src="icons/return.png" />Geri Dön</div></a>
<a href="personelekle.php"><div class="logo" style="margin-left:15px"><img src="icons/add-contact.png" />Personel Ekle</div></a>
</body>
</html>