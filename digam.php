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
         mysql_select_db(pharmacy) or die('cant connect');
         $pname = $_POST['pname'];
         $newstock = $_POST['newstock'];
         $rate = $_POST['rate'];
         $zold = "select productcode,balance,rate from stockbal where productcode = '$pname'";
         $laf = mysql_query($zold);
         $myzold = mysql_fetch_assoc($laf);
         $zashi = $myzold['balance'];
         echo 'Current Balance is....'.$zashi;
        ?>
    </body>
</html>
