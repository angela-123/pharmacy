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
        $opsk = $_POST['opstock'];
        $rate = $_POST['rate'];
        $cost =$_POST['ucost'];
        $exp = $_POST['exp'];
        $dept = $_POST['dept'];
        $date = $_POST['date'];
        $ostock = $_POST['ostock'];
        
        $dey = "select * from procks where productcode = '$pcode'";
        $mydey = mysql_query($dey);
        $rave = mysql_fetch_assoc($mydey);
        $rates = $rave['rate'];
        $ucost = $rave['unitcost'];
        $depts = $rave['dept'];
        $xpp = $rave['expirydate'];
        
        
        $yadd = "select * from oldstock where Name = '$pcode'";
        $yada = mysql_query($yadd);
        $yard = mysql_fetch_assoc($yada);
        $stoc = $yard['stock'];
        
        $asx = "insert into items(productcode,productname,rate,unitcost,opstock,expirydate,dept)values('$pcode','$pcode','$rates','$ucost','$opsk','$xpp','$depts')";
        
        $rak = mysql_query($asx) or die('cant insert into items');
        
        
        $rex = "insert into stockbal(productcode,productname,rate,unitcost,balance,oldstock)values('$pcode','$pcode','$rates','$ucost','$opsk','$stoc')";
        
        $raga = mysql_query($rex) or die('cant insert2');
        
        
        $sbal = "insert into stock(date,productcode,productname,opstock,qtyin,qtyout,balance)values(curdate(),'$pcode','$pcode','$opsk',0,0,'$opsk')";
        
        $rx = mysql_query($sbal) or die('cant insert auto stock');
        
        
        $ragx = "select productname,productcode,rate,unitcost,balance,oldstock,balance-oldstock as difference from stockbal";
        $ray = "select  sum(rate * balance)-sum(rate * oldstock) as raf from stockbal where balance > oldstock   ";
        
        $roto = mysql_query($ray) or die('cant query');
        
        $fat = mysql_fetch_assoc($roto);
        
        $shortage = $fat['raf'];
        
        
        $raya = "select sum(rate * balance)-sum(rate * oldstock) as raf from stockbal where balance < oldstock ";
        $rotor = mysql_query($raya) or die('cant query');
        $fata = mysql_fetch_assoc($rotor);
        $shortages = $fata['raf'];
        
        
        
        $tion = "select sum(rate * balance) as stockworth from stockbal";
        $gaga = mysql_query($tion);
        $nice = mysql_fetch_assoc($gaga);
        $wot = $nice['stockworth'];
        
        $res = mysql_query ($ragx);
        
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

echo '<tr>';
echo '<td>';
echo 'Total Overage';
echo '</td>';
echo '<td>';
echo number_format($shortage,2);
echo '</td>';
echo '</tr>';


echo '<tr>';
echo '<td>';
echo 'Total Shortage';
echo '</td>';
echo '<td>';
echo number_format($shortages,2);
echo '</td>';
echo '</tr>';


echo '<tr>';
echo '<td>';
echo 'Stock Worth';
echo '</td>';
echo '<td>';
echo number_format($wot,2);
echo '</td>';
echo '</tr>';



echo '</table>';
        
        
//echo $shortage;
//echo $shortages;
        
        ?>
    </body>
</html>
