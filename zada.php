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
        mysql_select_db(pharmacy)or die('vaan');
        $dat = $_POST['tdate'];
        $code = $_POST['code'];
        
        $fad = "select productcode,balance from stockbal where productcode = '$code'";
        
        $zax = mysql_query($fad)or die('cant query');
        
        $expx = mysql_fetch_assoc($zax);
        
        $exp = $expx['balance'];
        
        if($exp <= 1)
        {
            echo 'Drug Out Of Stock';
        }
        
 
     
            
 
        
        
        
        ?>
    </body>
</html>
