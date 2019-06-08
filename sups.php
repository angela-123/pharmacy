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
         
         $sup = $_POST['supname'];
         $add = $_POST['add'];
         $email = $_POST['email'];
         $phone = $_POST['phone'];
         
         $deg = "insert into suppliers(suppliername,address,email,phone)values('$sup','$add','$email','$phone')";
         
         mysql_query($deg);
         
        ?>
        
        <?php
         $sel = "select * from suppliers";
         
                 $rda = mysql_query($sel);
        
        
        $buns = mysql_num_fields($rda);
//$file_path = 'http://localhost/wmg/images/';

    	echo '<table class = "table table-responsive table-bordered">';
            
//echo '<caption>DAILY EXPENSES</caption>';
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
		echo$row2[$i],2;
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