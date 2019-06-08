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
         
         $asd = "select productcode,rate from items";
         
         $asda = mysql_query($asd);
         
         while ($row = mysql_fetch_assoc($asda))
         {
             $sac = $row['rate'];
             $prod = $row['productcode'];
             $fax = "update stockbal set rate = '$sac' where productcode = '$prod' ";
             
             mysql_query($fax) or die('cant insert');
         }
        ?>
    </body>
</html>
