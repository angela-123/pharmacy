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
                font-size: 14pt;
                font-weight:  bold;
                text-align:  left;
                color: #800020;
                width: 500px;
                color: yellow;
                
            }
            
            td{
                font-size: 13pt;
                color: darkred;
                border: 1px #0074cc solid;
                font-weight:  bolder;
                font-style: italic;
            }
            
            #diaga{
                width: 400px;
            }
            
            h4{
                color:  #fbfbfb;
            }
        </style>
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         
         $date = $_POST['date'];
         $supname = $_POST['supplier'];
         $pays = $_POST['payment'];
         
         $sdl = "insert into dailies(ddate,suppname,suppmt)values('$date','$supname','$pays')";
         $dre ="insert into drecs(ddate,productname,expenses,payments,purchases,banks,sales)values('$date','payments',0,$pays,0,0,0)" ;
         mysql_query($dre) or die('cant insert');
        if( mysql_query($sdl))
        {
            echo '<h4>'. 'Supplier`s Account has been crdited by...' .  number_format($pays) .'<br>' .'<h4>';
        }
        
 else {
            echo 'Failed Insert';
 }
         
        ?>
        
        <?php 
        $fed = "select SUM(qtyin * unitcost) As Credit,SUM(suppmt) As Payment from dailies where suppname = '$supname'";
        $dap = mysql_query($fed);
        $rolo = mysql_fetch_assoc($dap);
        $debit = $rolo['Credit'];
        $credit = $rolo['Payment'];
        $sarah = $debit - $credit;
        echo '<h4>'. 'Total Purchases Amount------------' .number_format($debit,2) .'<br>' .'<h4>';
        echo 'Total Payments To Supplier--------' .  number_format($credit,2) .'<br>';
        echo 'Balance is------------' .number_format($sarah);
        
        ?>
        
        <?php 
        $jilo = "select ddate as date,productcode as name,invoice, qtyin * unitcost As extended,suppmt as payment from dailies where suppname = '$supname' And suppmt + unitcost > 0";
        $res = mysql_query($jilo);
        
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
