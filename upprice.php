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
        $sp = $_POST['sp'];
        
        $upt = "update stockbal set rate = $sp where productcode = '$pname'";
        
        if(mysql_query($upt))
        {
            echo 'Price Update,Proceed';
            //echo $pname;
        }
 else {
     
            echo 'Price Not Update, Redo';
 }
        ?>
    </body>
</html>
