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
        
        $pname = $_POST['pname'];
        $date = $_POST['date'];
        $qty = $_POST['qty'];
        $qtty = -$qty;
        
        $rate = $_POST['rate'];
        $rated = $rate;
        $retz = $qty * $rate;
        $tup ="update stockbal set balance = balance-$qty where productname = '$pname'";
        $anc = "insert into dailies(ddate,productcode,productname,qtyin,unitcost)values('$date','$pname','$pname','$qtty','$rated')";
        
         $dre ="insert into drecs(ddate,productname,expenses,payments,purchases,banks,sales,cashrecs,returns,returnout,opbal)values('$date','returns',0,0,0,0,0,0,0,'$retz',0)" ;
        
        
        
        mysql_query($dre) or die('cant update stock');
        mysql_query($tup) or die('cant insert into dailies');
        $grt = mysql_query($anc) or die('cant return');
        
        
        
        
        ?>
    </body>
</html>
