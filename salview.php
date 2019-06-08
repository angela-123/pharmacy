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
                border: 1px  #d3d3d3 solid;
                font-style: italic;
                color: #761c19;
            }
            
            
            th{
                
                width: 920px;
                color: darkblue;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="libs/jquery-1.11.2.min.js"></script>
        
         
        
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script src="libs/jquery-ui-1.10.0.custom.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
         $comp = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy) or die('cant select');
         
         $month = $_POST['month'];
         $yr = $_POST['yr'];
         
         $zac = "select productname,rate from items";
         
         $maya = mysql_query($zac);
         
         //$butt = "select staffname,bonus,pension,housing,medicals,deduction from monthlies";
         
         //$raya = mysql_query($butt);
         
         while ($row1 = mysql_fetch_assoc($maya))
                 
                 
         {
             $rate = $row1['rate'];
             $prods = $row1['productname'];
             
             
             $butt = "select productname,rate from stockbal where rate = '$rate' and productname = '$prods'";
         
               $raya = mysql_query($butt);
             
             
             while ($row2 = mysql_fetch_assoc($raya))
             {
                 
                 
                 
                 
                 
             }
             
             
             
             
             
         }
         
         
         $reg = "select staffname,bonus,pension,medicals,deductions,month,year from salaries where month = '$month' and year = '$yr'";
         
         
         $dash = "select sdate,staffname,designation,bonus,pension,medicals,deductions, basicsalary,month,year,bonus+basicsalary+medicals-pension-deductions as netsalary from salaries where month = '$month' and year = '$yr'";
         
         $tbasic = 0.0;
         $tpen = 0.0;
         $tmed = 0.0;
         $tded = 0.0;
         $tbonus= 0.0;
         
         $rapt = mysql_query($dash);
         
         while ($dow = mysql_fetch_assoc($rapt))
         {
             
             $tbasic = $tbasic +$dow['basicsalary'];
             $tpen = $tpen + $dow['pension'];
             $tmed = $tmed +$dow['medicals'];
             $tded = $tded +$dow['deductions'];
             $tbonus = $tbonus +$dow['bonus'];
         }
         
         $totpaid = $tbasic + $tpen + $tmed  + $tbonus;
         
         
         $res = mysql_query($dash);
         
         
             $buns = mysql_num_fields($res);
             //echo '<>';
 echo '<table id = "diaga" >';
 echo '<tr>';
 echo '<td>';
 echo 'Month';
 echo '</td>';
 
 echo '<td>';
 echo $month;
 echo '</td>';
 
 echo '</tr>';
 
 
 echo '<tr>';
 echo '<td>';
 echo 'Year';
 echo '</td>';
 
 echo '<td>';
 echo $yr;
 echo '</td>';
 
 echo '</tr>';
 
 echo '<tr>';
 echo '<td>';
 echo 'Date';
 echo '</td>';
 
 echo '<td>';
 echo $month;
 echo '</td>';
 
 echo '</tr>';
 
 
 
 
echo '<tr>';
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($res, $i).'</th>';
}
echo '</tr>';

while ($row = mysql_fetch_row($res))
{
	echo '<tr>';
	
	for($i = 0;$i<$buns;$i++)
	
	{
		echo '<td>';
                if(is_numeric($row[$i]))
                {
		echo number_format($row[$i]);
                }
                
 else {
                    echo $row[$i];
 }
                
	}   echo '</td>';
	echo '</tr>';
}

echo '<tr>';
 echo '<td>';
 echo 'Total Basic Salary';
 echo '</td>';
 
 echo '<td>';
 echo number_format($tbasic);
 echo '</td>';
 
 echo '</tr>';
 
 
 echo '<tr>';
 echo '<td>';
 echo 'Total Pension';
 echo '</td>';
 
 echo '<td>';
 echo number_format($tpen);
 echo '</td>';
 
 echo '</tr>';
 
 echo '<tr>';
 echo '<td>';
 echo 'Total Medicals';
 echo '</td>';
 
 echo '<td>';
 echo number_format($tmed);
 echo '</td>';
 
 echo '</tr>';
 
 
 
 echo '<tr>';
 echo '<td>';
 echo 'Total Deductions';
 echo '</td>';
 
 echo '<td>';
 echo number_format($tded);
 echo '</td>';
 
 echo '</tr>';


 echo '<tr>';
 echo '<td>';
 echo 'Total Bonus';
 echo '</td>';
 
 echo '<td>';
 echo number_format($tbonus);
 echo '</td>';
 
 echo '</tr>';

 echo '<tr>';
 echo '<td>';
 echo 'Total Paid Out';
 echo '</td>';
 
 echo '<td>';
 echo number_format($totpaid);
 echo '</td>';
 
 echo '</tr>';
 
 

echo '</table>';




 



//echo '</table>';








echo '</div>';
 
         
        ?>
    </body>
</html>
