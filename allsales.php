<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        th{
            background:orange;
        }
        
        </style>
    </head>
    <body>
    <?php
         $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         
         $date = $_POST['date'];
         $dtx = $_POST['dtx'];
         $cashier = $_POST['cashier'];
         
         $gaf = "select ddate As date,productname,qtysold,unitprice,qtysold * unitprice As Amount from dailies where  ddate between '$date' And '$dtx' And qtysold > 0";
         $zam = "select SUM(qtysold * unitprice) As Total from dailies where ddate between '$date' And '$dtx'";
         $tram = mysql_query($zam);
         $trebor = mysql_fetch_assoc($tram);
         $total = $trebor['Total'];
         //echo $total;
         
         
                          $rda = mysql_query($gaf) or die('cant insert');
        
        
        $buns = mysql_num_fields($rda);
//$file_path = 'http://localhost/wmg/images/';

    	echo '<table class = "table table-responsive">';
            
            echo '<tr>';
            echo '<td>';
            echo 'Sales Analysis Between:  ';
            echo '</td>';
            echo '<td>';
            echo $date .'And' .$dtx;
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
      echo 'Total Sales';
      echo '</td>';
      
       echo '<td>';
      echo number_format($total);
      echo '</td>';
      
      echo '</tr>';
     
    
    echo '</table>';
        
         
        ?>
    </body>
</html>