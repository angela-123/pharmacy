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
            #diaga thh{
                width: 60px;
                text-align: left;
                font-size: 11pt;
                border: 1px;
                font-weight: bolder;
                color:  #990033;
            }
            
            #gagad{
                position: absolute;
                bottom:0px;
                right:50px;
                width: 200px;
                background:wheat;
                font-size: 14pt;
                right: 300px;
                color:  #009999;
            }
            
            
            .fct{
                
               
                font-weight: bold;
            }

td{

border: 1px black solid;
}
            
            
th{
    color: black;
    font-weight: normal;
    font-size: 1.2em;
}    



th{
                
                
                font-size: 1.2em;
                font-style: normal;
                color: black;
                font-weight: bolder;
            }
            
            td{
                
                border: 2px #888 solid;
                font-size: 1.1em;
                font-weight:bolder;
            }
            
            
            .tidi{
                
                font-size: 1em;
                font-weight: bold;
            }
            .lag{
                font-size: 1em;
                font-weight:bold;
                color:black;
            }
            
            #laga{
                
                font-style: italic;
            }
            
            h5{
                font-weight: bolder;
            }
            
            
            .muje{
                
                font-size: 1.1em;
            }
            
            li{
                
                text-align:center;
                color: black;
                font-size: 1em;
                list-style:  none;  
            }
            
            thead{
                
                text-align: left;
            }
            
            nobr{
                
                text-align:  center;
            }
            
            h2x{
                
                position: absolute;
                bottom: 20px;
                left:  600px;
            }
            
            #diaga{
                alignment-baseline:  middle;
            }
                        
        </style>
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
$dat = $_POST['tdate'];
$code = $_POST['pname'];
//$cod = $_POST['mattype'];
$qt = $_POST['qty'];
$adj = $_POST['adj'];
$rec = $_POST['recno'];
$cashier = $_POST['cashier'];
$disc = $_POST['disc'];
$naira = $_POST['naira'];
$stype = $_POST['stype'];
$cname = $_POST['cname'];
//echo $disc,$naira;
$daya = "select productname, rate,unitcost from stockbal where productcode = '$code'";
//$titi = "select date, productcode,balance from stock where productcode = '$code')";
$rose = mysql_query($daya);
//$ck = mysql_query($titi);

$dog = mysql_fetch_assoc($rose);
//$eso = mysql_fetch_assoc($stock);

$uprice = $dog['rate']+$adj;
$pname = $dog['productname'];
$ucost = $dog['unitcost'];
$olbal = $dog['balance'];
//$newbal = $olbal - $qt;
//echo $pname;

$slix = $qt * $uprice;
$chk = "select nrec, productcode,qtysold,recno from dailies where recno ='$rec' and productcode = '$code'";
$fx = mysql_query($chk);
$dx = mysql_fetch_assoc($fx);
$qtysold = $dx['qtysold'];
//echo 'Qty sold is' .$qtysold;

//$sql = "insert into dailies(ddate,productcode,productname,qtysold,unitprice,unitcost,recno,cashier,disc,naira,salestype,customer)values('$dat','$code','$pname', '$qt','$uprice', '$ucost', '$rec','$cashier','$disc','$naira','$stype','$cname')";
//$dre ="insert into drecs(ddate,productname,expenses,payments,purchases,banks,sales)values('$dat','$code',0,0,0,0,'$slix')" ;
//$zal = "insert into stock(date,productcode,productname,qtyout,balance)values('$dat','$code','$pname','$qt','$newbal')";
//mysql_query($dre) or die('cant update');
$dija = "delete  from dailies where recno = '$rec' and productcode = '$pname' ";
mysql_query($dija) or die('cant delete');

echo 'Qtysold is.........'.$qtysold;

//mysql_query($zal)or die('cant insert');

$rect = "select productname as productname,sum(qtysold) as qty,unitprice as rate,sum(qtysold) * unitprice - disc * 0.01 * unitprice * sum(qtysold) As extended from dailies where recno = '$rec' GROUP BY productname ";
$teck = "select sum(disc * .01 * unitprice * qtysold)+ sum(naira) as totaldiscount from dailies";
$eel = "select SUM(qtysold * unitprice)-sum(disc * 0.01 *unitprice * qtysold) As Total from dailies where recno = '$rec'";
$over = "select SUM(qtysold * unitprice)-sum(naira) As Totalsales from dailies where ddate = '$dat' And cashier = '$cashier'";
$tsales =  mysql_query($over);
$mydisc = mysql_query($teck);
$pract = mysql_fetch_assoc($mydisc);
$totdisc = $pract['totaldiscount'];
//$daya = "select rate from restitems where menuitem = '$cod'";


$res = mysql_query($rect)or die('cant query');
$rdx = mysql_query($eel);
$drq = mysql_fetch_assoc($rdx);
$mysales = mysql_fetch_assoc($tsales);

        $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-bordered table-stripe table-hover">';
                
                echo '<ul align = "left">';
                echo '<li class = "lag">TROVELA PHARMACY</li>';
                echo '<li class ="lag">PLOT MF 22,DUTSE ALHAJI</li>';
                
                   
                //echo '<li class ="lag">Royal Indomie Road</li>';
                echo '<li class ="lag">DUTSE,ABUJA</li>';
                //echo '<nobsp>';
                //echo '<li class ="lag">NassarawaState</li>';
                echo '<li class ="lag"></li>';
                //echo '<li>Area 3,Garki,Abuja</li>';
                //echo '<li>ABUJA</li>';
                //echo '<li>' .'08099388887,07032305841'.'</li>';
                echo '<li class = "tidi">' .$dat.'</li>' ;
                echo '<li class = "tidi">Cashier..' .$cashier.'</li>' ;
                //echo '<li>Waiter..' .$waiter.'</li>' ;
                echo '<li class = "tidi">Receipt#..' .$rec.'</li>' ;
                echo '<li class = "tidi">' .$mytime.'</li>' ;
                //echo '<li class = "tidi">08033906302</li>' ;
                echo '</ul>';
                
           
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
      
      echo '';
      echo '';
      echo '';
      echo '';
      
      
      
      
      
      
      
                echo 'Total';
                echo '</td>';
                
                echo '<td>';
                echo '<nobr>';
                echo number_format($drq['Total']-$naira);
                echo '</nobr>';
                echo '</td>';
                echo '</tr>';
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
        
    
                
	
    
    
    echo '</table>';
    echo '<h5 align = "center">Received above items in good condition </h5>';
echo '<h5 align = "center">No refund of money after payment </h5>';

//echo '<h5 align = "center">Motto:Gods time the best </h5>';

//echo '<h6 align = "center">Thanks for your patronage </h6>';
        ?>
    
        
        
        <script type="text/javascript">
	$("#diagaa").dialog(
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
        $titi = "select * from stockbal where productcode = '$code' And balance > 0";
        $stock = mysql_query($titi);
         while($eso = mysql_fetch_assoc($stock))
         {
         $olbal = $eso['balance'];
         }
        ?>
        
        <?php 
        
         $newbal = $olbal + $qtysold;
         $zal = "insert into stock(date,productcode,productname,qtyout,balance)values(curdate(),'$code','$pname','$qtysold','$newbal')";
         mysql_query($zal);
         
        ?>
        
        <?php 
        $sop = "select *  from stockbal where productcode = '$code'";
        $gas = mysql_query($sop);
        $zow = mysql_fetch_assoc($gas);
        $xbal = $zow['balance'];
        $coom = $xbal + $qtysold;
        //echo $coom;
        //echo $xbal;
        
        $update = "UPDATE stockbal SET balance = '$coom' where productcode = '$code'";
        mysql_query($update);
        ?>

    </body>
     
</html>
