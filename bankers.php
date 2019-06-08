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
        $bank=$_POST['bank'];
        $details = $_POST['details'];
        $amount = $_POST['amount'];
        
        $dre ="insert into drecs(ddate,productname,expenses,payments,purchases,banks,sales,cashrecs)values('$dat','bank deposit',0,0,0,'$amount',0,0)" ;
        
        $bnks = "insert into banks(bdate,bank,details,amount)values('$dat','$bank','$details','$amount')";
        
        mysql_query($bnks) or die('cant insert into banks table');
        
        mysql_query($dre) or die('Cant insert');
        
        $rxa = "select bdate as date,bank,details,amount from banks where bdate = '$dat'";
        
        
        $res = mysql_query($rxa);
        
        
        
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
