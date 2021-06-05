<?php 
$username='root';
$pswrd='';
$con=new PDO('mysql:host=localhost;dbname=magazayonetimsistemi',$username,$pswrd);
$id=$_GET['id'];
$sorgumetni="Select * From personeller WHERE magazaid=".$id;
?>
<html>
    <link rel="stylesheet" href="magazapersonel.css">
    <head>
        <title>Mağaza Personelleri</title>
    </head>
    <body>
    <table id="customers">
    <thead>
            <tr style="text-align:center">
                <th>Ad</th>
                <th>Soyad</th>
                <th>Telefon</th>
                <th>Mail</th>
                <th>Personele Git</th>
            </tr>
            </thead><?php
            foreach($con->query($sorgumetni)as $row)
        {
        echo'
        <tr>
        <td>'.$row["ad"].'</td>
        <td>'.$row["soyad"].'</td>
        <td>'.$row["tel"].'</td>
        <td>'.$row["mail"].'</td>
        <td><a href="personeldetay.php?id='.$row["id"].'">Personele Detayına Git</a></td>
        </tr>
        ';
        }
        ?>
</tr>
</table>
<a href="magazalar.php"><div class="logo"><img src="icons/return.png" />Geri Dön</div></a>
</body>
</html>