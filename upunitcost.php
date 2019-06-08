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
        
        $retu = "select productcode,unitcost from items";
        $ama = mysql_query($retu);
        
        while ($row = mysql_fetch_assoc($ama))
        {
            $pname = $row['productcode'];
            $unitcost = $row['unitcost'];
            
            $ups = "update dailies set unitcost = '$unitcost' where productcode = '$pname'";
            mysql_query($ups);
            echo 'Updates...'  .$pname. 'With' .$unitcost;
        }
        
        ?>
    </body>
</html>
