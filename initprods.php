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
         $pname = $_POST['pname'];
         $uprice = $_POST['uprice'];
         $ucost = $_POST['ucost'];
         $expiry = $_POST['expiry'];
         
         $zade = "insert into products(productcode,productname,unitprice,unitcost,expirydate)values('$pcode','$pname','$uprice','$ucost','$expiry')";
         $red  = mysql_query($zade) or die('cant insert');
 
          if($red)
          {
              echo 'Data Inserted';
              echo '<ul>';
              echo '<li>' .'Productcode =     '    .$pcode .'</li>' .'<br>';
              echo '<li>' .'Productname =     '    .$pname .'<li>' .'<br>';
              echo '<li>' .'Unitprice    =    '    .$uprice .'</li>' .'<br>';
              echo '<li>'.'Unitcost     =     '    .$ucost .'</li>' .'<br>';
              echo '<li>' .'Expiry Date   =   '    .$expiry .'</li>' .'<br>';
              echo '</ul>';
          }
          
          
 else {
     
              echo 'Data Not Inserted';
 }
        ?>
    </body>
</html>
