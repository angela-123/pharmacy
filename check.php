<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PRICES</title>
        <style>
        h1{
                font-size: 18px;
                font-weight:  bolder;
                color:  darkred;
            }
        </style>    
    </head>
    <body>
        <?php
        
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
                 
         $dname = $_POST['dname'];
         
         $sqa = "select productcode,rate from stockbal where productcode = '$dname'";
         
         $res = mysql_query($sqa);
         
         $rada = mysql_fetch_assoc($res);
         
         $dprice = $rada['rate'];
         
         if($res)
         {
             echo '<h1>'. 'Price Of ' .$dname       .         '         is      =    '          . number_format($dprice,2) .'<h1>';
         }
         
 else {
     
             echo 'Data Not Retrieved';
 }
         
         
         
        
        ?>
    </body>
</html>
