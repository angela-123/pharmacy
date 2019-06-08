<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>STOCK REPORT</title>
        <style>
            th{
                
                text-align:  left;
                font-family:  sans-serif;
                font-weight: bolder;
                color:  black;
                background: wheat;
                
            }

            td{
                font-size:1.2em;
                color:black;
                font-family:Arial Black;
            }
            
            #diaga{
                font-size: 10pt;
                border: 1px #0000cc solid;
                color:  #003580;
            }
            
            #diaga td{
                border: 1px #ED872D solid;
            }
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
    <div class = "container-fluid">
    <div class = "row">
    <div class = "col-md-6 col-md-offset-3">
        <?php
        
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         
         $ede = "select productname,balance from stockbal";
         $res = mysql_query($ede);
         
                  $buns = mysql_num_fields($res);
                echo '<table  class = "table table-responsive table-boredred table-hover table-bordered">';
                
                
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
     //echo '<tr>';
                
           
                //echo '<tr>';
      
      
                //echo '<tr>';
   
    
    echo '</table>';
        
        ?>
    
	</div>
    </div>
    </div>
    </body>
</html>
