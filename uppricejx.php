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
        $nas = mysql_connect('localhost','staff','angela');
        mysql_select_db(pharmacy);
        $pname = $_POST['pname'];
        $sp = $_POST['sp'];
        $recnon = $_POST['recno'];
        echo $recnon;
        $recno = $recnon;
        
        
        $upt = "update dailies set unitprice = $sp where productcode = '$pname' and recno = '$recno'";
        
      mysql_query($upt);
 
 
 $rect = "select productname as productname,sum(qtysold) as qty,unitprice as rate,sum(qtysold) * unitprice - disc * 0.01 * unitprice * sum(qtysold) As extended from dailies where recno = '$recno' GROUP BY productname ";
$teck = "select sum(disc * .01 * unitprice * qtysold)+ sum(naira) as totaldiscount from dailies";
$eel = "select SUM(qtysold * unitprice)-sum(disc * 0.01 *unitprice * qtysold) As Total from dailies where recno = '$recno'";
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
                echo '<li class = "lag">DRUGMART</li>';
                echo '<li class ="lag">Shop 13,Cirus Mall By Gaduwa Estate></li>';
                
                   
                //echo '<li class ="lag">Royal Indomie Road</li>';
                echo '<li class ="lag">Gaduwa,Abuja</li>';
                //echo '<nobsp>';
                //echo '<li class ="lag">NassarawaState</li>';
                echo '<li class ="lag">08052481315</li>';
                //echo '<li>Area 3,Garki,Abuja</li>';
                //echo '<li>ABUJA</li>';
                //echo '<li>' .'08099388887,07032305841'.'</li>';
                echo '<li class = "tidi">' .$dat.'</li>' ;
                echo '<li class = "tidi">Cashier..' .$cashier.'</li>' ;
                //echo '<li>Waiter..' .$waiter.'</li>' ;
                echo '<li class = "tidi">Receipt#..' .$recno.'</li>' ;
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
    echo '<h5 align = "center">Received above goods in good condition </h5>';
echo '<h5 align = "center">No refund of money after payment </h5>';

//echo '<h5 align = "center">Motto:Gods time the best </h5>';

        ?>
    </body>
</html>
