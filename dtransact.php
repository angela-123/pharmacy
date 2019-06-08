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
        
        $date = $_POST['date'];
        
        $bista = "select ddate as date,opbal,productname,expenses,payments,purchases,banks,cashrecs,returns,returnout,sales from drecs where ddate ='$date'";
        
        $sumx = "select ddate,sum(expenses) as texpenses,sum(payments) as tpayment,sum(purchases) as tpurchases,sum(banks) as tbanks,sum(sales)as tsales,sum(cashrecs) as tcashrecs,sum(opbal) as bal,sum(returns) as rets,sum(returnout) as returnsout from drecs where ddate = '$date' group by ddate";
        $crd = "select ddate, sum(qtysold * unitprice) as tsales from dailies where salestype = 'credit' and ddate = '$date' group by ddate";
        
        $cd = mysql_query($crd);
        
        $cdx = mysql_fetch_assoc($cd);
        
        $credit = $cdx['tsales'];
        
        $sade = mysql_query($sumx);
        
        $dx = mysql_fetch_assoc($sade);
        
        $sales = $dx['tsales'];
        $payments = $dx['tpayment'];
        $exp = $dx['texpenses'];
        $purchases = $dx['tpurchases'];
        $banks = $dx['tbanks'];
        $crec = $dx['tcashrecs'];
        $balax = $dx['bal'];
        $rets = $dx['rets'];
        $rout = $dx['returnsout'];
        
        //echo $credit;
        
        $cbal = $sales - $payments - $exp - $banks +$crec+$balax-$rets;
        
        
        
        
        
        
        
        $res = mysql_query($bista) or die('cant query');
                
                
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
echo 'Opening Balance For The Day';
echo '</td>';

echo '<td>';
echo number_format($balax,2);
echo '</td>';


echo '</tr>';












echo '<tr>';
echo '<td>';
echo 'Total Sales For The Day';
echo '</td>';

echo '<td>';
echo number_format($sales,2);
echo '</td>';


echo '</tr>';


echo '<tr>';
echo '<td>';
echo 'Total Expenses For The Day';
echo '</td>';

echo '<td>';
echo number_format($exp,2);
echo '</td>';


echo '</tr>';


echo '<tr>';
echo '<td>';
echo 'Total Payments For The Day';
echo '</td>';

echo '<td>';
echo number_format($payments,2);
echo '</td>';


echo '</tr>';


echo '<tr>';
echo '<td>';
echo 'Total Purchases For The Day';
echo '</td>';

echo '<td>';
echo number_format($purchases,2);
echo '</td>';


echo '</tr>';


echo '<tr>';
echo '<td>';
echo 'Total Bank Deposit For The Day';
echo '</td>';

echo '<td>';
echo number_format($banks,2);
echo '</td>';


echo '</tr>';

echo '<tr>';
echo '<td>';
echo 'Cash Receipts';
echo '</td>';

echo '<td>';
echo number_format($crec,2);
echo '</td>';


echo '</tr>';




echo '<tr>';
echo '<td>';
echo 'Total Sales Returns';
echo '</td>';

echo '<td>';
echo number_format($rets,2);
echo '</td>';


echo '</tr>';



echo '<tr>';
echo '<td>';
echo 'Total Purchase Returns';
echo '</td>';

echo '<td>';
echo number_format($rout,2);
echo '</td>';


echo '</tr>';



echo '<tr>';
echo '<td>';
echo 'Total Credit Sales';
echo '</td>';

echo '<td>';
echo number_format($credit,2);
echo '</td>';


echo '</tr>';








echo '<tr>';
echo '<td>';
echo 'Closing Balance For The Day';
echo '</td>';

echo '<td>';
echo number_format($cbal,2);
echo '</td>';


echo '</tr>';





echo '</table>';
                
                
        ?>
    </body>
</html>
