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
         
         
         $loko = "select monthname(ddate) as month, sum(qtysold * unitprice) as sales from dailies where year(ddate) ='$yr' group by monthname(ddate)";
         
         $yoko = "select sum(qtysold * unitprice) as sales from dailies where year(ddate) ='$yr' group by year(ddate)";
         
         $tessy = mysql_query($yoko);
         
         $dara = mysql_fetch_assoc($tessy);
         $yrsales = $dara['sales'];
         
         $res = mysql_query($loko);
         
         
         if($res)
         {
             echo 'Preview Record';
         }
         
 else {
             echo 'No Data Returned';
 }
 
 
  
            $buns = mysql_num_fields($res);
                echo '<table id = diaga title = "PREVIEW">';
                
                
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
    echo 'Total Sales For The Month';
    echo '</td>';
    echo '<td>';
    echo number_format($yrsales);
    echo '</td>';
    
    echo '</tr>';
     
                
   
    
    echo '</table>';
 
         
         
        ?>
    </body>
</html>
