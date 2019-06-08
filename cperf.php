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
                text-align:  left;
                color:  #0000cc;
                width: 480px;
                
            }
            
            
            td{
                border: 1px background solid;
                color:  purple;
                
            }
        </style>
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         $cname = $_POST['cname'];
         
         $month = $_POST['month'];
         $yr = $_POST['yr'];
         
         $efcc = "select cashier,sum(qtysold * unitprice) as totalsales from dailies where monthname(ddate) = '$month' and year(ddate) = '$yr' and cashier!='' group by cashier ";
         $saz = "select sum(qtysold * unitprice) as total from dailies where monthname(ddate) = '$month' and year(ddate) = '$yr'";
         $tade = mysql_query($saz);
         
         $res = mysql_query($efcc);
         
         $ors = mysql_fetch_assoc($tade);
         $allsales = $ors['total'];
         if($res)
         {
             //echo 'Returned Data';
         }
         
         
 else {
             echo 'No Data Returned';
 }
 
 
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
    echo 'Total Sales For The Month';
    echo '</td>';
    echo '<td>';
    echo number_format($allsales);
    echo '</td>';
    
    echo '</tr>';
     
                
   
    
    echo '</table>';
 
        ?>
    </body>
</html>
