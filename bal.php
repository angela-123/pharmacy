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
        
        $dat = $_POST['date'];
        $bal = $_POST['opbal'];
        
        $dre ="insert into drecs(ddate,productname,expenses,payments,purchases,banks,sales,cashrecs,opbal)values('$dat','opening balance',0,0,0,0,0,0,'$bal')" ;
        
        mysql_query($dre) or die('cant insert into payments');
        
        
        $yar ="select ddate as date,opbal as openingbalance from drecs where ddate ='$date' and opbal >0";
        
        $res = mysql_query($yar);
        
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
        
        
        
        ?>
    </body>
</html>
