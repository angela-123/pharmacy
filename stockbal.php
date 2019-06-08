<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>STOCK BALANCE</title>
        
        <style>
            th{
                text-align: left;
                font-size: 10pt;
                font-weight:  bold;
                color:  #0055cc;
                width: 550px;
            }
            
            
            td{
                font-size: 10pt;
                font-weight:  bolder;
                color:  #000099;
                border: 1px #e9322d solid;
                    
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
         
         $izal = "select productcode,balance from stockbal where productcode!=''";
         
         $res = mysql_query($izal)or die('cant query');
         
                 
                
        $buns = mysql_num_fields($res);
//$file_path = 'http://localhost/wmg/images/';

    	echo '<table id = "diaga" title = "STOCK BALANCE">';
            
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
        
         <script type="text/javascript">
	$("#diaga").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"590",
			    position:"center"
			    
			    	
			}
			
			);
	</script>

    </body>
</html>
