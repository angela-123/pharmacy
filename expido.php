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
        $exp = $_POST['expid'];
        $amt = $_POST['amt'];
        
        $doh = "update expenses set amount = $amt where expid = '$exp' and expdate = '$date'";
        
        $tas = mysql_query($doh);
        
        if($tas)
        {
            echo '<blink>Record Updated</blink>';
        }
        
 else {
            echo '<blink>Record Not Updated</blink>';
 }
        ?>
    </body>
</html>
