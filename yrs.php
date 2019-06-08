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
         
         
         $yr = $_POST['year'];
         
         
         
         
          
        $sqlx = "select monthname(ddate) as date, sum(qtysold * unitprice) as totalsales from dailies where  year(ddate)= '$yr' group by monthname(ddate)";
        $sqlxx = "select sum(qtysold * unitprice) as tsales from dailies where  year(ddate)= '$yr'";
        
        $rez = mysql_query($sqlx);
         $opo = mysql_query($sqlxx);
         $prof = mysql_fetch_assoc($opo);
         $profit = $prof['tsales'];
         
         
         //echo $profit;
         
         
         
         $res = mysql_query($sqlx);
         
         
                    $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-bordered">';
                
                
                echo '<tr>';
                
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($res, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($res))
{
	echo '<tr>';
	
	for($i = 0;$i<$buns;$i++)
	
	{
		echo '<td>';
		if(is_numeric($row2[$i]))
		{
		echo number_format( $row2[$i],2);
		}
		
		else 
		{
			echo '<nobr>'. $row2[$i] . '</nobr>';
		}
	}   echo '</td>';
	echo '</tr>';
        
        
        
    }
    
    echo '<tr>';
    echo '<td>';
    echo 'Total Sales For The Year';
    echo '</td>';
    echo '<td>';
    echo number_format($profit);
    echo '</td>';
    
    echo '</tr>';
     
                
   
    
    echo '</table>';
 
         
         
         
        ?>
    </body>
</html>