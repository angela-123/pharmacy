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
         $taski = mysql_query($zold);
         $myzold = mysql_fetch_assoc($taski);
         $zashi = $myzold['rate'];
         $xana = "update stockbal set rate = '$rate' where productcode = '$pname'";
        $tessy =  mysql_query($xana)or die('cant update');
         if($tessy)
         {  
             echo 'Previous Price is.................'  .$zashi.'<br>';
             echo 'New Price is.................'  .$rate.'<br>';
         }
         
 else {
             echo 'Null Update, Redo' .'<br>';
}

$zilch = "insert into stock(date,productcode,productname,opstock,qtyin,qtyout,balance)values(curdate(),'$pname','$pname',0,0,0,'$newstock')";

//$tack = mysql_query($zilch);

     
         
        ?>
    </body>
</html>
