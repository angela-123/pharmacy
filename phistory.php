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
        <style>
            th{
                
                text-align: left;
                color:  #000099;
                
            }
        </style>
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         $pcode = $_POST['pcode'];
         $dayo = "select ddate as date,productname,qtyin,unitcost,suppname from dailies where productname = '$pcode' and qtyin > 0";
         
         $taro = "select MAX(unitcost) as maxcost,MIN(unitcost) as mincost from dailies where productname = '$pcode'";
         
         $rass = mysql_query($taro);
         
         $max = mysql_fetch_assoc($rass);
         $maxcost = $max['maxcost'];
         $mincost = $max['mincost'];
         $res = mysql_query($dayo);
         
         if($res)
         {
             echo 'Preview';
         }
         
 else {
     
             echo 'No Preview';
 }
 
                    $buns = mysql_num_fields($res);
                echo '<table id = diaga title = "STOCK WORTH">';
                
                
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
    echo 'Maximum Cost Price';
    echo '</td>';
    
    echo '<td>';
    echo $maxcost;
    echo '</td>';
    
    
    echo '</tr>';
     
    echo '<tr>';
    echo '<td>';
    echo 'Minimum Cost Price';
    echo '</td>';
    
    echo '<td>';
    echo $mincost;
    echo '</td>';
    
    
    echo '</tr>';
    
    
    
    
    echo '</table>';
         
 
        ?>
    </body>
</html>
