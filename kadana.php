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
                
                color: darkblue;
            }
            
            tds{
                color: orangered;
                font-size: 0.3em;
            }
        </style>
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         
         $pcode = $_POST['pcode'];
         
         $trek = "select productcode,balance,oldstock,rate from stockbal where productcode = '$pcode'";
         
         $res = mysql_query($trek);
         
                   $buns = mysql_num_fields($res);
                echo '<table id = diaga title = "CUSTOMERS" class = "table table-responsive table-bordered table-hover">';
                
                
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
		echo '<td id = "tds">';
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
     
                
   
    
    echo '</table>';
 
         
         
        ?>
    </body>
</html>
