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
         $dtx = $_POST['dtx'];
         $sqlx = "select productcode,qtysold,unitprice,unitcost, qtysold * unitprice as extended,qtysold * unitcost as cost,qtysold * unitprice -qtysold * unitcost as profit from dailies where ddate between '$date' and '$dtx' and qtysold > 0";
        $sqlxx = "select sum(qtysold * unitprice -qtysold * unitcost) as profit from dailies where ddate between '$date' and '$dtx'";
        
        //$rez = mysql_query($sqlx);
         $opo = mysql_query($sqlxx);
         $prof = mysql_fetch_assoc($opo);
         $profit = $prof['profit'];
         
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
    echo 'Profit For The Day';
    echo '</td>';
    echo '<td>';
    echo number_format($profit);
    echo '</td>';
    
    echo '</tr>';
     
                
   
    
    echo '</table>';
 
         
         
         
        ?>
        
    </body>
</html>