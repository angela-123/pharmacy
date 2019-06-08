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
         $cname = $_POST['cname'];
         
         $sql = "insert into customers(customername)values('$cname')";
         
         $red = mysql_query($sql);
         
         if($red)
         {
             //echo "Customer Record Updated";
         }
         
         
 else {
             echo 'Customer Record Not Updated';
 }
 
 
    $raya = "select customername from customers";
    
    $res = mysql_query($raya);
 
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
     
                
   
    
    echo '</table>';
 
         
        ?>
        
 
        
    </body>
</html>
