<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         
         $kode = $_POST['kode'];
         
         $zex = "select productname,rate,unitcost from stockbal where productcode = '$kode'";
         
         $res = mysql_query($zex);
         $dash = mysql_fetch_assoc($res);
         $rate = $dash['rate'];
         $cost = $dash['unitcost'];
         $date = $dash['expirydate'];
         if($res)
         {
         
         
         //$rate = $dash['rate'];
         echo 'Current Selling Price is        '. number_format($rate) .'<br>';
         echo 'Current Cost Price is            '.  number_format($cost) .'<br>'; 
         //echo 'The expiry date is            '.$date .'<br>'; 
         }
         
         
         
        ?>
    </body>
</html>
