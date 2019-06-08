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
         
         $xanu = "select productcode,rate from items";
         
         
         $dogg = mysql_query($xanu);
         
         $ralop = "select productcode,rate from stockbal";
             
             $dida = mysql_query($ralop);
             $nums = mysql_num_rows($dida);
         
         while ($row = mysql_fetch_assoc($dogg))
         {
             $rate = $_POST['rate'];
             $prod = $_POST['productcode'];
             
             
             
             while ($maya = mysql_num_rows($dida))
             {
                 $sele = "update stockbal set rate = '$rate' where productcode = '$prod'";
                 
                 mysql_query($sele)or die('cant update');
                 
             }
             
             
             
             
         }
        ?>
    </body>
</html>
