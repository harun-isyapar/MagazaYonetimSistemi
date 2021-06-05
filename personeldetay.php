<?php 
$username='root';
$pswrd='';
$con=new PDO('mysql:host=localhost;dbname=magazayonetimsistemi',$username,$pswrd);
$id=$_GET['id'];
$sth = $con->prepare("SELECT personeller.ad as PersAd, personeller.soyad, personeller.tel, personeller.mail, magazalar.ad FROM personeller INNER JOIN magazalar on personeller.magazaId=magazalar.id  where personeller.id=".$id);
$sth->execute();
$result = $sth->fetch(PDO::FETCH_OBJ);
$ad = $result->PersAd;
$soyad = $result ->soyad;
$tel = $result ->tel;
$mail = $result ->mail;
$magaza = $result->ad;
?>
<html>
    <link rel="stylesheet" href="personeldetay.css">
    <head>
        <title><?php echo $ad.' '.$soyad ?></title>
    </head>
    <body>
    <table id="customers">
    <thead>
            <tr style="text-align:center">
                <th>Ad</th>
                <th>Soyad</th>
                <th>Telefon</th>
                <th>Mail</th>
                <th>Mağaza</th>
            </tr>
            </thead>
            <tr>
        <td><?php echo $ad ?></td>
        <td><?php echo $soyad ?></td>
        <td><?php echo $tel ?></td>
        <td><?php echo $mail ?></td>
        <td><?php echo $magaza ?></td>
        </tr>
</tr>
</table>
<div style="height: 120px; width: 400px; margin-left: 38%;margin-top: 50px;">
    <a href="personelguncelle.php?id=<?php echo $id ?>"><div class="logo"><img src="icons/update.png" width="70px" height="70px" />Güncelle</div></a>
    <a href="javascript:history.back()"><div class="logo" ><img src="icons/return.png" width="70px" height="70px" />Geri Dön</div></a>
    <a href="personelsil.php?id=<?php echo $id ?>"><div class="logo"><img src="icons/delete.png" width="70px" height="70px"/>Sil</div></a>
</div>
</body>
</html>