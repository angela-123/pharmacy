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
        <style>
            h1{
                font-size: 30pt;
                font-weight:  bolder;
            }
            
            h6{
                font-weight:  bolder;
                font-size:1.2em;
            }
        </style>
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         
         $kode = $_POST['pname'];
         
         //$zex = "select productcode,rate from stockbal where productcode = '$kode'";
         $tita = "select productname,rate,balance from stockbal where productname = '$kode'";
         
         //$res = mysql_query($zex);
         $tek = mysql_query($tita);
         //$dash = mysql_fetch_assoc($res);
         $trash = mysql_fetch_assoc($tek);
         $rate = $trash['rate'];
         $stock = $trash['balance'];
         $date = $dash['expirydate'];
         $fname = $trash['productname'];
         
         
         
         
         //$rate = $dash['rate'];
         echo '<h6>' .'Current Selling Price is     =   '     . number_format($rate) .'<br>' .'<h6>';
         //echo '<h6>'. 'Stock Balance is         =   '   .  number_format($stock) .'<br>' .'</h6>'; 
         echo '<h6>'.'Full Name is... ..'         . $fname .'<br>' .'</h6>'; 
         
         
         
         
        ?>
    </body>
</html>
