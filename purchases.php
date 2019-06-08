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
            #diaga th{
                width: 150px;
                text-align: left;
                font-size: 9pt;
                border: 1px;
                font-weight: normal;
                color:  #990033;
            }
            
            #gaga{
                position: absolute;
                top:500px;
                left:190px;
                width: 200px;
                background: #ffcccc;
                font-size: 14pt;
                right: 300px;
                color:  #009999;
            }
            
            #diaga td{
                font-size: 8pt;
                color:  #003580;
                
            }
            
            #river{
                position:  absolute;
                
                width: 220px;
                height: 70px;
                background: honeydew;
                font-size: 11pt;
                border: 1px #ffcccc solid;
                right:10px;
                color: darkred;
                font-weight:  bold;
            }
            
            
        </style>
        
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        <?php
        /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$nas = mysql_connect('localhost','staff','angela');
mysql_select_db(pharmacy);
$datw = $_POST['tdate'];
$code = $_POST['code'];
//$cod = $_POST['mattype'];
$qt = $_POST['qty'];
$unitcost = $_POST['unitcost'];
$rec = $_POST['recno'];
$cashier = $_POST['cashier'];
$supplier = $_POST['supplier'];
$invoice = $_POST['invoice'];
$rate = $_POST['rate'];
$expd = $_POST['expd'];

$slick = $qt * $unitcost;

//$amt = $qt * $rat;
//$date = "update items set expirydate = '$expd' where productcode = '$code'";
//mysql_query($date);
//$zal = "insert in
$daya = "select productcode,productname, rate,expirydate from items where productcode = '$code'";
$titix = "select productname, productcode,balance from stockbal where productcode = '$code'";
//$rose = mysql_query($daya);
$stockx = mysql_query($titix);

//$dog = mysql_fetch_assoc($rose);
$eso = mysql_fetch_assoc($stockx);

//$uprice = $dog['rate'];
$pname = $eso['productname'];
//$expp = $dog['expirydate'];
$expdx = $_POST['expd'];
//$olbal = $eso['balance'];
//$newbal = $olbal - $qt;
//echo $expp;
//echo $expdx;

$slix = $qt * $uprice;
$sql = "insert into dailies(ddate,productcode,productname,qtyin,unitcost,suppname,recno,cashier,invoice,unitprice)values(curdate(),'$code','$pname', '$qt','$unitcost','$supplier','$rec','$cashier','$invoice','$rate')";
$debx = "UPDATE stockbal SET unitcost = $unitcost where productcode = '$code'";
$treb = "UPDATE items SET expirydate = '$expdx' where productcode = '$code'";
//$date = "update items set expirydate = '$expd' where productcode = '$code'";
mysql_query($debx);
mysql_query($treb);
//mysql_query($date);
//$zal = "insert into stock(date,productcode,productname,qtyout,balance)values('$dat','$code','$pname','$qt','$newbal')";
$dre ="insert into drecs(ddate,productname,expenses,payments,purchases,banks,sales)values(curdate(),'$code'  ,0,0,'$slick',0,0)" ;


//mysql_query($dre) or die('cant insert main table');

mysql_query($sql) or die('cant insert');



//mysql_query($zal)or die('cant insert');

$rect = "select productname,qtyin,unitcost,qtyin * unitcost As Extended from dailies where recno = '$rec' ";
$eel = "select SUM(qtyin * unitcost) As Total from dailies where recno = '$rec'";
$over = "select SUM(qtyin * unitcost) As Totalpurchases from dailies where ddate = '$dat' And recno = '$rec'";
$mysup = "select SUM(qtyin * unitcost) As Totalpurchases,SUM(suppmt) As Payments from dailies where suppname = '$supplier'";
$tsales =  mysql_query($over);
$tot = mysql_query($mysup);
//$daya = "select rate from restitems where menuitem = '$cod'";
$reb = mysql_fetch_assoc($tot);
$purch = $reb['Totalpurchases'];
$pmts = $reb['Payments'];
$purchbal = $purch - $pmts;

$rt = "select curdate() as date";

$rpx = mysql_query($rt);
$dx = mysql_fetch_assoc($rpx);
$dat = $dx['date'];


$res = mysql_query($rect)or die('cant query');
$rdx = mysql_query($eel);
$drq = mysql_fetch_assoc($rdx);
$mysales = mysql_fetch_assoc($tsales);

        $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-bordered table-striped table-hover">';
                
                echo '<tr>';
                echo '<td>';
                echo 'Receipt#';
                echo '</td>';
                echo '<td>';
                echo $rec;
                echo '</td>';
                echo '</tr>';
                
                
                echo '<tr>';
                echo '<td>';
                echo 'Date';
                echo '</td>';
                
                echo '<td>';
                echo '<nobr>';
                echo $dat;
                echo '</nobr>';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo 'Cashier';
                echo '</td>';
                
                echo '<td>';
                echo '<nobr>';
                echo $cashier;
                echo '</nobr>';
                echo '</td>';
                echo '</tr>';
                
                
                
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>';
                echo $supplier;
                echo '</td>';
                echo '</nobr>';
                echo '</tr>';
           
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
                echo 'Total';
                echo '</td>';
                
                echo '<td>';
                echo '<nobr>';
                echo $drq['Total'];
                echo '</nobr>';
                echo '</td>';
                echo '</tr>';
        
    
    //echo '</table>';
	
    
    
    echo '</table>';
        ?>
    
        <div id="gaga"></div>
        
        
        <script type="text/javascript">
	$("#diaga").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"290",
			    position:"right center"
			    
			    	
			}
			
			);
	</script>
        
        <?php 
        $titi = "select date, productcode,balance from stock where productcode = '$code' And balance > 0";
        $stock = mysql_query($titi);
         while($eso = mysql_fetch_assoc($stock))
         {
         $olbal = $eso['balance'];
         }
        ?>
        
        <?php 
        
         $newbal = $olbal + $qt;
         $zal = "insert into stock(date,productcode,productname,qtyin,balance)values('$dat','$code','$pname','$qt','$newbal')";
         mysql_query($zal);
         
        ?>
        
        <?php 
        $sop = "select *  from stockbal where productcode = '$code'";
        $gas = mysql_query($sop);
        $zow = mysql_fetch_assoc($gas);
        $xbal = $zow['balance'];
        $coom = $xbal + $qt;
        //echo $coom;
        //echo $xbal;
        
        $update = "UPDATE stockbal SET balance = '$coom' where productcode = '$code'";
        mysql_query($update);
        ?>
        
<script type="text/javascript">
	$("#riverr").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"460",
			    position:"right bottom"
			    
			    	
			}
			
			);
	</script>

        
        
        
    </body>
     
</html>
