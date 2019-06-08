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
         $zold = "select productcode,balance,rate,unitcost from stockbal where productcode = '$pcode'";
         $taski = mysql_query($zold);
         $myzold = mysql_fetch_assoc($taski);
         $zashi = $myzold['rate'];
         $rcost = $myzold['unitcost'];
         $stockold = $myzold['balance'];
         $xana = "update stockbal set rate = '$rate' where productcode = '$pname'";
         $xanax = "update items set rate = '$rate' where productcode = '$pname'";
         
         //mysql_query($xana);
         //mysql_query($xanax);
         echo '<h5>...Current Selling Price...............' . number_format($zashi,2);
         echo '<h5>...Current Cost Price...............' . number_format($rcost,2);
         echo '<h5>..Stock Balance ..............' .$stockold;
        
         
         
        ?>
    </body>
</html>
