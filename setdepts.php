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
         
         $dasp = "select productcode,productname,dept from items";
         
         $rapo = mysql_query($dasp);
         
         while ($row = mysql_fetch_assoc($rapo))
                 
         {
             $product = $row['productcode'];
             
             $set = "select productcode,productname,type from products where productcode = '$product' ";
             
             $rez = mysql_query($set);
             
             $input = mysql_fetch_assoc($rez);
             $rinput = $input['type'];
             
             
             $jiko = "update items set dept = '$rinput' where productcode = '$product'";
             
             mysql_query($jiko) or die('cant update');
         }
         
         
        ?>
    </body>
</html>
