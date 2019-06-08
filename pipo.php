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
                font-size: 1em;
                font-weight:  bold;
                text-align:  left;
                color: #800020;
                
            }
            
            td{
                font-size: 0.90em;
                color: black;
                border: 1px #0074cc solid;
                font-weight:  bolder;
            }
            
            #diaga{
                width: 400px;
            }
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         
         $date = $_POST['date'];
         $supname = $_POST['supplier'];
         $pays = $_POST['payment'];
         
         $sdl = "insert into dailies(ddate,customer,custpmt)values('$date','$supname','$pays')";
        if( mysql_query($sdl))
        {
            echo 'Customers`s Account has been crdited by...' .  number_format($pays) .'<br>';
        }
        
 else {
            echo 'Failed To Insert';
 }
         
        ?>
        
        <?php 
        $fed = "select SUM(qtysold * unitprice) As Credit,SUM(custpmt) As Payment,sum(disc * 0.01 * qtysold * unitprice)+ sum(naira) as discount from dailies where customer = '$supname'";
        $dap = mysql_query($fed);
        $rolo = mysql_fetch_assoc($dap);
        $debit = $rolo['Credit'];
        $credit = $rolo['Payment'];
        $disc = $rolo['discount'];
        $sarah = $credit - $debit;
        echo 'Total Purchases Amount------------' .number_format($debit,2) .'<br>';
        echo 'Total Payments By Customer--------' .  number_format($credit,2) .'<br>';
        echo 'Total Discount For Customer--------' .  number_format($disc,2) .'<br>';
        echo 'Balance is------------' .number_format($sarah);
        
        ?>
        
        <?php 
        $jilo = "select ddate as date,productcode as name, qtysold * unitprice As extended,disc * 0.01 * unitprice * qtysold+naira as discount,naira as discinnaira,custpmt as payment from dailies where customer = '$supname' and qtysold + disc + custpmt+naira >0";
        $res = mysql_query($jilo);
        
        $dre ="insert into drecs(ddate,productname,expenses,payments,purchases,banks,sales,cashrecs)values('$date','cash receipts',0,0,0,'$amount',0,'$credit')" ;
        
        mysql_query($dre) or die('cant insert into payments');
        
          $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-hover table-striped table-bordered">';
                
                
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
                echo 'Total Bill';
                echo '</td>';
                 echo '<td>';
                echo number_format($debit,2);
                echo '</td>';
                echo '</tr>';
           
                echo '<tr>';
      
      echo '<tr>';
                echo '<td>';
                echo 'Total Payment';
                echo '</td>';
                 echo '<td>';
                echo number_format($credit,2);
                echo '</td>';
                echo '</tr>';
           
                echo '<tr>';
                
                echo '<tr>';
                echo '<td>';
                echo 'Total Discount';
                echo '</td>';
                 echo '<td>';
                echo number_format($disc,2);
                echo '</td>';
                echo '</tr>';
           
                echo '<tr>';
                
                
                
                
                
                
                
                $bala = $toamt - $tpmt;
    
                
                
                
                
                
                
                
    
	        echo '<tr>';
                echo '<td>';
                echo 'Balance';
                echo '</td>';
                 echo '<td>';
                echo number_format($sarah,2);
                echo '</td>';
                echo '</tr>';
           
                echo '<tr>';
   
    
    echo '</table>';
        
        
        ?>
    </body>
</html>
