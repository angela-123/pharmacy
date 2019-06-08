<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <body>
    <?php
         $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         
         $date = $_POST['date'];
         $cashier = $_POST['cashier'];
         
         $gaf = "select ddate As date,productname,qtysold,unitprice,disc,naira,qtysold * unitprice - disc * 0.01 * unitprice * qtysold As Amount,cashier from dailies where  ddate = '$date' and qtysold > 0";
         $zam = "select SUM(qtysold * unitprice)-sum(disc * 0.01 * unitprice * qtysold)-sum(naira) As Total from dailies where  ddate = '$date'";
         $zama = "select sum(disc * 0.01 * unitprice * qtysold)+sum(naira) As Total from dailies where cashier = '$cashier' And ddate = '$date'";
         $fuel = "select SUM(qtysold * unitprice)-sum(disc * 0.01 * unitprice * qtysold)-sum(naira) As Totalcredit from dailies where  ddate = '$date' and salestype = 'credit' and customer!='na'";
         $aitel = mysql_query($fuel);
         $go = mysql_fetch_assoc($aitel);
         $tcredit = $go['Totalcredit'];
         
         $taya = mysql_query($zama);
         $mydisc = mysql_fetch_assoc($taya);
         $totdisk = $mydisc['Total'];
         echo $totdisk;
         $tram = mysql_query($zam);
         $trebor = mysql_fetch_assoc($tram);
         $total = $trebor['Total'];
         //echo $total;
         
         
                          $rda = mysql_query($gaf) or die('cant insert');
        
        
        $buns = mysql_num_fields($rda);
//$file_path = 'http://localhost/wmg/images/';

    	echo '<table class = "table table-responsive table-striped table-bordered">';
            
            echo '<tr>';
            echo '<td>';
            echo 'Sales Analysis For:  ';
            echo '</td>';
            echo '<td>';
            echo $cashier;
            echo '</td>';
            echo '</tr>';
echo '<tr>';
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($rda, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($rda))
{
	echo '<tr >';
	
	for($i = 0;$i<$buns;$i++)
	
	{
		echo '<td>';
		if(is_numeric($row2[$i]))
		{
		echo number_format($row2[$i]);
		}
		
		else 
		{
			echo '<nobr>'. $row2[$i] . '</nobr>';
		}
	}   echo '</td>';
	echo '</tr>';
    }
      echo '</tr>'; 
      
      echo '<tr>';
     
      echo '<td>';
      echo 'Total Discount';
      echo '</td>';
      
       echo '<td>';
      echo number_format($totdisk);
      echo '</td>';
      
      echo '</tr>';
     
      
      
      echo '<tr>';
     
      echo '<td>';
      echo 'Total Sales';
      echo '</td>';
      
       echo '<td>';
      echo number_format($total,2);
      echo '</td>';
      
      echo '</tr>';
     
      
      echo '<tr>';
     
      echo '<td>';
      echo 'Total Credit Sales';
      echo '</td>';
      
       echo '<td>';
      echo number_format($tcredit,2);
      echo '</td>';
      
      echo '</tr>';
      $totcash = $total - $tcredit;
      
      
      echo '<tr>';
     
      echo '<td>';
      echo 'Total Cash Sales';
      echo '</td>';
      
       echo '<td>';
      echo number_format($totcash,2);
      echo '</td>';
      
      echo '</tr>';
      
      
    
    echo '</table>';
        
         
        ?>
        
    </body>
</html>