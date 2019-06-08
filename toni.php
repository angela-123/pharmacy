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
            p{
                font-size: 12pt;
                color:  #003366;
                font-weight:  bold;
                border: 1px #006FCC solid;
                width: 350px;
            }
            
            input[type = "button"]
            {
                width: 120px;
                height: 65px;
                
            }
        </style>
    </head>
    <body> 
     
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         $pnam = $_POST['pname'];
         
         $meg = "select productcode,opstock,rate,unitcost from items where productcode = '$pnam'";
         
         $dex = mysql_query($meg);
         $dexa = mysql_fetch_assoc($dex);
         $pname = $dexa['opstock'];
         $rate = $dexa['rate'];
         $cost = $dexa['unitcost'];
         
         $all = "select productcode, sum(qtysold) as totalqty,sum(qtysold * unitprice) as totalsales,sum(qtyin) as totalpurchases from dailies where productcode = '$pnam' group by productcode";
         
         $robb = mysql_query($all);
         
         $rod = mysql_fetch_assoc($robb);
         $totqty = $rod['totalqty'];
         $salse = $rod['totalsales'];
         $purch = $rod['totalpurchases'];
         
        
         echo '<p class = "form-control">'.'Opening Stock..................' .$pname .'<br>' .'</p>';
         echo '<p class = "form-control">'.'Current Rate..................' .$rate .'<br>' .'</p>';
         echo '<p class = "form-control">'.'Current Unitcost..................' .$cost .'<br>' .'</p>';
         echo '<p class = "form-control">'. 'Total Sales Quantity.................' .$totqty .'<br>' .'</p>';
         echo '<p class = "form-control">'. 'Total Sold In Naira......................'  .number_format($salse ).'<br>' .'</p>';
         echo '<p class = "form-control">'.'Total Purchases Quantity..................' .$purch .'<br>' .'</p>';
         echo '<p class = "form-control">'.'Total Purchases Amount..................' .number_format($purch * $cost) .'<br>' .'</p>';
         echo '<p class = "form-control">'.'Stock Balance..................' .($pname+$purch-$totqty).'<br>' .'</p>';
         
        ?>
    </body>
</html>
