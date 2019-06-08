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
                
                width: 500px;
                text-align: left;
                color:  #eee;
                font-size: 12pt;
                font-weight: bolder;
            }
            
            td{
                
                border: 1px #eee solid;
                font-weight:  bold;
                color: silver;
            }
            
            h3{
                
                color: yellow;
            }
        </style>
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         
         $invoice = $_POST['invoice'];
         $spname = $_POST['spname'];
         
         $yala = "select ddate, productcode,qtyin,unitcost,qtyin * unitcost as extended from dailies where invoice = '$invoice' and suppname = '$spname'";
         $prox = "select invoice,productcode,sum(qtyin * unitcost) as total from dailies where invoice = '$invoice' and suppname = '$spname' group by invoice";
         
         $rask = mysql_query($prox);
         $zit = mysql_fetch_assoc($rask);
         
         $total = $zit['total'];
         
         $res = mysql_query($yala);
         
         if($res)
         {
             echo '<h3>'. 'Supplername......................' .$spname .'<br>' .'<h3>';
             echo '<h3>'. 'Invoice Number....................'.$invoice .'<br>'.       '<h3>';
         }
         
 else {
             echo 'NO DATA';
     
 }
 
           $buns = mysql_num_fields($res);
                echo '<table id = diaga title = "PAYMENT ANALYSIS">';
                
                
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
                echo 'Total Purchases';
                echo '</td>';
                 echo '<td>';
                echo number_format($total,2);
                echo '</td>';
                echo '</tr>';
           
                echo '<tr>';
      
      
    
    
	        
           
                //echo '<tr>';
   
    
    echo '</table>';
        ?>
    </body>
</html>
