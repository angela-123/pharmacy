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
        $pname = $_POST['pname'];
        $name = $_POST['name'];
        
        $rupt = "update stockbal set productname = '$name',productcode = '$name' where productcode = '$pname'";
        $dupt = "update dailies set productname = '$name',productcode = '$name' where productname ='$pname'";
        $raji = mysql_query($dupt);
        
        $tad = mysql_query($rupt);
        
        if($tad)
        {
            if($tad)
            {
            echo '<blink>RECORDS  UPDATED</blink> ';
            }
        }
        
        
 else {
     
            echo 'Records Not Updated';
 }
        ?>
    </body>
</html>
