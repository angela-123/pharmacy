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
         
         $kode = $_POST['kode'];
         
         $caya = "select date,productcode,opstock,qtyin,qtyout,balance from stock where productcode = '$kode'";
         $kool = "select productcode,sum(opstock) +sum(qtyin)-sum(qtyout) as stockbal from stock where productcode= '$kode' group by productcode";
         $das = mysql_query($kool)or die('cant query');
         
         $zaya = mysql_fetch_assoc($das);
         $stockbalance = $zaya['stockbal'];
         
         $res = mysql_query($caya);
         
         
         if($res)
         {
             //echo 'Preview Records';
             //echo 'Computed Stock Balance' +$stockbalance;
         }
         
         
 else {
             echo 'No Returned Records';
 }
 
 
         $buns = mysql_num_fields($res);
//$file_path = 'http://localhost/wmg/images/';

    	echo '<table class = "table table-responsive table-bordered">';
            
//echo '<caption>DAILY EXPENSES</caption>';
echo '<tr>';
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($res, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($res))
{
	echo '<tr >';
	
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
      echo '</tr>'; 
      
     
    
    echo '</table>';
 
 
        ?>
    </body>
</html>
