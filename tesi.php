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
        $zon = mysql_connect('localhost','staff','angela');
        mysql_selectdb(pharmacy);
        $prods = $_POST['pcode'];
        
        $sel = "select productname,productcode,balance from stockbal where productname = '$prods'";
        
        $zade = mysql_query($sel);
        
        $rodo = mysql_fetch_assoc($zade);
        
        $balance = $rodo['balance'];
        
        echo '<b>'.'Old Balance..........'. $balance .'<b>';
        
        
        
        
        ?>
    </body>
</html>
