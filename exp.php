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
        $zonn = mysql_connect('localhost','staff','angela');
        mysql_select_db(pharmacy);
        
        $loc = $_POST['loc'];
        $recby = $_POST['recby'];
        $cc = $_POST['cc'];
        $details = $_POST['details'];
        $amount = $_POST['amount'];
        
        $exp = "insert into expenses(recby,expdate,costcenter,details,amount)values('$recby',curdate(),'$cc','$details','$amount')";
        $dre ="insert into drecs(ddate,productname,expenses,payments,purchases,banks,sales)values(curdate(),'expenses','$amount',0,0,0,0)" ;
        mysql_query($dre) or die('cant insert');
        
        if(mysql_query($exp))
        {
            echo 'Data Inserted';
        }
        
 else {
            echo 'Data Not Inserted';
            
            
            
 }
 
 
 $daya = "select expdate as date,recby as receivedby,costcenter,details,amount from expenses where expdate = curdate() and amount > 0";
 $go = "select sum(amount) as total from expenses where expdate = curdate() group by expdate";
 $goo = mysql_query($go);
 $gad = mysql_fetch_assoc($goo);
 $tamout = $gad['total'];
 
 
 $res = mysql_query($daya);
 
 
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
echo 'Total Expenses For The Day';
echo '</td>';
echo '<td>';
echo number_format($tamout,2);
echo '</td>';
echo '</tr>';
echo '</table>';
 
        ?>
    </body>
</html>
