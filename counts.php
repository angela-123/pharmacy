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
            td{
                font-weight: normal;
                font-size: 9pt;
            }
        </style>
    </head>
    <body>
        <?php
        $zon = mysql_connect('localhost','staff','angela');
        mysql_selectdb(pharmacy);
        
        $prods = $_POST['prod'];
        $stock = $_POST['stock'];
        $date = $_POST['date'];
        
        
        $dasa = "select productcode,productname,balance,rate from stockbal where productcode = '$prods'";
        $rap = mysql_query($dasa);
        $top = mysql_fetch_assoc($rap);
        
        $bal = $top['balance'];
        $pname = $top['productname'];
        $prate = $top['rate'];
        $diff = $stock - $bal;
        
        $ftr = "insert into stockcount(date,productcode,productname,qtycounted,oldstock,difference,rate)values('$date','$prods','$pname','$stock','$bal','$diff','$prate')";
           
           $fred = mysql_query($ftr);
           
           if($fred)
           {               echo 'Productname............' .$pname;
               echo 'Old Stock...............' .$bal;
           }
 else {
     
               echo 'Not Computed';
 }
           
           
           
           $juke = "update stockbal set balance = '$stock' where productname = '$prods'";
           
           $jack = mysql_query($juke)or die('cant update');
           
           
           if($jack)
           {
               echo'<b>'. 'New Stock..........' .$stock .'<b>';
           }
           
 else {
               echo 'Stock Not Updated';
 }
           
        
 
 $ret = "select date,productcode,qtycounted as newstock,oldstock,difference,rate,rate * difference as variance from stockcount where date = '$date' ";
 
 $tar = "select date,sum(rate * difference) as varince from stockcount where date = '$date' group by date";
 $wisik = mysql_query($tar);
 
 $ball = mysql_fetch_assoc($wisik);
 $variance = $ball['varince'];
  $res = mysql_query($ret);
  
                      $buns = mysql_num_fields($res);
                echo '<table id = diaga title = "STOCK TAKING">';
                
                
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
    echo 'Total Variance';
    echo '</td>';
    
    echo '<td>';
    echo number_format($variance);
    echo '</td>';
    
    
    echo '</tr>';
     
   
    
    
    
    echo '</table>';
  
        
        
        ?>
    </body>
</html>
