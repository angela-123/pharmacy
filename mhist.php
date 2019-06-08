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
         
         $dname = $_POST['dname'];
         //$year = $_POST['yr'];
         $del = "select ddate as date,suppname,invoice,productname,qtyin,unitcost,qtyin * unitcost as extended from dailies where productcode = '$dname' and qtyin > 0";
         $rda = mysql_query($del);
         //echo $month;
         
         if($rda)
         {
             echo 'Preview Purchases';
             //echo $month;
         }
         
 else {
             echo 'No Preview';
 }
 
   

 
                 
         
        ?>
        
        <?php 
                                 //$rda = mysql_query($abj) or die('cant insert');
        
        
        $buns = mysql_num_fields($rda);
//$file_path = 'http://localhost/wmg/images/';

    	echo '<table class = "table table-responsive table-bordered">';
            
            
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
      
     
    
    echo '</table>';
 
        ?>
    </body>
</html>
