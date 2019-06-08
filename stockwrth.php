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
                
                font-size: 1.2em;
                font-weight: normal;
                color: black;
                background:orange;
                
            }
            
            td{
                font-size: 1.3em;
                color: black;
                border: 1px #b3b3b3 solid;
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
         
         
         $sera = "select productcode,rate,balance,rate * balance as stockworth from stockbal";
         $tutu = "select sum(rate * balance) as totalstockworth from stockbal";
         $joko = mysql_query($tutu);
         $tina = mysql_fetch_assoc($joko);
         $stockworth = $tina['totalstockworth'];
         $res = mysql_query($sera);
         
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
     echo '<tr>';
                echo '<td>';
                echo 'Total Stock Worth';
                echo '</td>';
                 echo '<td>';
                echo number_format($stockworth,2);
                echo '</td>';
                echo '</tr>';
           
                echo '<tr>';
      
      
    
    echo '</table>';
         
         
        ?>
        
    
        </div>
        </div>
        </div>
    </body>
</html>
