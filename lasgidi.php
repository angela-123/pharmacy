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
         $pcode = $_POST['pcode'];
         $rate = $_POST['rate'];
         $zold = "select productcode,balance,rate from stockbal where productcode = '$pcode'";
         $taski = mysql_query($zold);
         $myzold = mysql_fetch_assoc($taski);
         $zashi = $myzold['rate'];
         $stockold = $myzold['balance'];
         $xana = "update stockbal set rate = '$rate' where productcode = '$pcode'";
         $xanax = "update items set rate = '$rate' where productcode = '$pcode'";
         mysql_query($xana);
         mysql_query($xanax);
         
         echo '<h4>SELLING PRICE UPDATED</h4>';
         
        ?>
    </body>
</html>
