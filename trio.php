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
         $fxi = "insert into items(productcode,productname,rate,unitcost,expirydate,dept)select productcode,productname,rate,unitcost,expirydate,dept from procks";
         
         $sag = mysql_query($fxi)or die('cant query');
        ?>
    </body>
</html>
