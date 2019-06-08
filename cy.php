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
         
         $qtx = $_POST['qtrr'];
         
         $sqlx = "select quarter(ddate) as quarter, sum(qtysold * unitprice) as totalsales from dailies where  quarter(ddate)= '$qtx' group by quarter(ddate)";
        $sqlxx = "select sum(qtysold * unitprice) as tsales from dailies where quarter(ddate)= '$yr'";
        
        $rez = mysql_query($sqlx);
         $opo = mysql_query($sqlxx);
         $prof = mysql_fetch_assoc($opo);
         $profit = $prof['tsales'];
        
         echo 'Quarter....'.$qtx;
         
         $res = mysql_query($sqlx);
         
           $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-bordered table-stripe table-hover">';
                
                
                
           
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
      
      echo '';
      echo '';
      echo '';
      echo '';
      
      
      
      
      
      
      
                echo 'Total';
                echo '</td>';
                
                echo '<td>';
                echo '<nobr>';
                echo number_format($drq['Total']-$naira);
                echo '</nobr>';
                echo '</td>';
                echo '</tr>';
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
        
    
                
	
    
    
    //echo '</table>';
    //echo '<h5 align = "center">Received above goods in good condition </h5>';
//echo '<h5 align = "center">No refund of money after payment </h5>';

//echo '<h5 align = "center">Motto:Gods time the best </h5>';

         
        ?>
    </body>
</html>
