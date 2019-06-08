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
        
        $rtx = "select Code,Name,Rate,Cost,Stock from cstock";
        $dbx = "select productcode,productname,rate,unitcost,balance from stockbal";
        
        
        
        $poq = mysql_query($rtx);
        $nrows = mysql_num_rows($poq);
        echo $nrows;
        
        while ($row = mysql_fetch_assoc($poq))
        {
            $pcode = $row['Code'];
            $pname = $row['Name'];
            $rate = $row['Rate'];
            $cost = $row['Cost'];
            $bal = $row['Stock'];
            
            for($i = 1;$i<=$nrows;$i++)
            {
                
                $mf = "insert into stockbal(productcode,productname,rate,unitcost,balance,opdate)values('$pcode','$pname','$rate','$cost','$bal',curdate())";
                
                mysql_query($mf);
            }
        }
        ?>
    </body>
</html>
