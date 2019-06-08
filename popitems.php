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
        
        $rtx = "select code,name,rate,cost from newitems";
        $dbx = "select productcode,productname,rate,unitcost,opstock from items";
        
        
        
        $poq = mysql_query($rtx);
        $nrows = mysql_num_rows($poq);
        echo $nrows;
        
        while ($row = mysql_fetch_assoc($poq))
        {
            $pcode = $row['code'];
            $pname = $row['name'];
            $rate = $row['rate'];
            $cost = $row['cost'];
            
            for($i = 1;$i<=$nrows;$i++)
            {
                
                $mf = "insert into items(productcode,productname,rate,unitcost,opstock)values('$pcode','$pname','$rate','$cost',0)";
                
                mysql_query($mf);
            }
        }
        ?>
    </body>
</html>
