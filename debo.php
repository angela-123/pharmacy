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
        $yas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pos);
         
          $dey = "select pcode,pname,rate from products where pcode = '$name'";
          
          $cax = mysql_query($dey);
          $zamp = mysql_fetch_assoc($cax);
          
          $codename = $zamp['pname'];
          $rate = $zamp['rate'];
         
         $name = $_POST['name'];
         //$price = $_POST['price'];
         $qty = $_POST['qty'];
         
         $mili = "insert into dailies(rdate,pcode,qtyout,unitprice,recno)values(CURDATE(),'$name','$qty','$rate',683)";
         
         if(mysql_query($mili))
         {
             echo 'Sales Inserted';
         }
         
 else {
     
             echo 'Not Inserted';
 }
        ?>
        
        <?php
        
        $des = "select rdate, pcode,SUM(qtyout)As qty,unitprice,SUM(qtyout) * unitprice As extended from dailies where recno = '683' GROUP BY pcode";
        $tonu = "select SUM(qtyout * unitprice) As Total from dailies where recno = '683'";
        $res = mysql_query($des) or die('cant query');
        $zash = mysql_query($tonu);
        
        $fun = mysql_fetch_assoc($zash);
        $finalsales = $fun['Total'];
        $buns = mysql_num_fields($res);
                echo '<table id = diaga title = "Preview Job" width = "80">';
                
                
           
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
    //echo '<td>';
    
    echo '<td>'. '<nobr>'. 'Total For Receipt' .'</nobr>' .'</td>';
    
    //echo '</td>';
    
    echo '<td>';
    echo number_format($finalsales,2);
    echo '</td>';
    
    echo '</tr>';
    
    //echo '</table>';
	
    
    
    echo '</table>';
        
        ?>
        
        <?php
        $uyi = "select SUM(qtyout * unitprice) As Totalsales from dailies where rdate = '$date' And cashier = '$cashier'";
        ?>
    </body>
</html>
