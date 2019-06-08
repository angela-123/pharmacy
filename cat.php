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
        
        <style>
            #diaga{
                
                width: 300px;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
        mysql_select_db(pharmacy);
        
        $cname = $_POST['cname'];
        $od = $_POST['od'];
        $date = $_POST['date'];
        $cashier = $_POST['cashier'];
        
        $ride = "insert into dailies(ddate,productcode,productname,qtysold,unitprice,cashier)values('$date','$cname','$cname',1,'$od','$cashier')";
        
        $salas = mysql_query($ride) or die('cant insert');
        
        if($salas)
        {
            echo 'Old Debt Inserted' .'<br>';
            echo 'Amount.......................' .$od;
        }
 else {
     
            echo 'Not Inserted';
 }
 
 
 
        
 
 
 
        ?>
    </body>
</html>
