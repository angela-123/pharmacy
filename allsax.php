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
                font-family:  sans-serif;
                font-size: 10pt;
                font-weight: bold;
                color:  indigo;
                background:  #d59392;
                width: 450px;
            }
            
            #diaga td{
                font-family: fantasy;
                font-size: 9pt;
                color:  #000099;
                
            }
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         
         $date = $_POST['date'];
         $pcode = $_POST['pcode'];
         
         $abj = "select stkid, date,productcode,qtyin,qtyout,balance As Stock from stock where productcode = '$pcode'";
         
         $res = mysql_query($abj);
         
         if($res)
         {
             echo 'Preview Records';
         }
         
 else {
             echo 'Query Failed';
 }
        
 
                         $rda = mysql_query($abj) or die('cant insert');
        
        
        $buns = mysql_num_fields($rda);
//$file_path = 'http://localhost/wmg/images/';

    	echo '<table id = "diaga" title = "POSTED ITEM">';
            
            
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
      echo '<tr>';
     
      echo '<td>';
      echo 'Total Sales';
      echo '</td>';
      
       echo '<td>';
      echo number_format($total);
      echo '</td>';
      
      echo '</tr>';
     
    
    echo '</table>';
 
 
     
        ?>
        
        <script type="text/javascript">
	$("#diaga").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"660",
			    position:"right top"
			    
			    	
			}
			
			);
	</script>
        
    </body>
</html> 
