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
        $xs = "select * from procks where productcode = '$pcode'";
        $mx = mysql_query($xs);
        $dte = mysql_fetch_assoc($mx);
        
        $rate = $dte['rate'];
        
        echo '<h4>' .$rate .'<h4>'
        
        
        
            
            
        ?>
    </body>
</html>
