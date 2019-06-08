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
        $zon = mysql_connect('localhost','staff','angela');
        mysql_selectdb(pharmacy);
        
        $date = $_POST['date'];
        $bal = $_POST['bal'];
        $did = $_POST['did'];
        
        $ups = "update drecs set opbal = $bal  where ddate = '$date' and did = '$did'";
        
          if(mysql_query($ups) or die('cant query'))
          {
              echo '<blink>OPENING BALANCE UPDATED</blink>';
          }
 else {
     
              echo 'Not Updated';
 }
        ?>
    </body>
</html>
