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
        //$pname = $_POST['pname'];
        $opsk = $_POST['opstock'];
        $rate = $_POST['rate'];
        $cost =$_POST['ucost'];
        $exp = $_POST['exp'];
        //$dept = $_POST['dept'];
        //$date = $_POST['date'];
        //$ostock = $_POST['ostock'];

        $yx = "select * from stockbal where productcode = '$pcode'";
        $tx = mysql_query($yx);
        $runs = mysql_num_rows($tx);
        if($runs > 0)
        {
            echo '<h1>This Item is already registered</h1>';
            return;
        }
        
        //echo $pcode;
        $asx = "insert into items(productcode,productname,rate,unitcost,opstock)values('$pcode','$pcode','$rate','$cost','$opsk')";
        
        $rak = mysql_query($asx) or die('cant insert into items');
        
        
        $rex = "insert into stockbal(productcode,productname,rate,unitcost,balance,oldstock,expiry)values('$pcode','$pcode','$rate','$cost','$opsk','$opsk','$exp')";
        
        $raga = mysql_query($rex) or die('cant insert2');
        
        
        $sbal = "insert into stock(date,productcode,productname,opstock,qtyin,qtyout,balance)values(curdate(),'$pcode','$pcode','$opsk',0,0,'$opsk')";
        
        $rx = mysql_query($sbal) or die('cant insert auto stock');
        
        
        $yup = "select productcode,productname,rate,unitcost,balance,oldstock as opstock from stockbal where productcode = '$pcode'";
        $res = mysql_query($yup);
        
                         $buns = mysql_num_fields($res);
 
 echo '<table id = "diaga" class = "table table-responsive table-striped table-bordered table-hover">';
echo '<tr>';
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($res, $i).'</th>';
}
echo '</tr>';

while ($row = mysql_fetch_row($res))
{
	echo '<tr>';
	
	for($i = 0;$i<$buns;$i++)
	
	{
		echo '<td contententeditable = "true">';
		echo $row[$i];
	}   echo '</td>';
	echo '</tr>';
}





echo '</table>';
        
        
//echo $shortage;
//echo $shortages;
        
        ?>
    </body>
</html>
