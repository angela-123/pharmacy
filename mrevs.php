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
                width: 650px;
                text-align: left;
                color:  #000099;
            }
            
            
            td{
                font-size: 10pt;
                color:  darkred;
                border: 1px #aaaaaa solid;
            }
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
        
    </head>
    <body>
        
        <?php
        
        
                  $zon = mysql_connect('localhost','staff','angela'); 
            mysql_selectdb(pharmacy);
$user = $_SESSION['username'];
$wela = "select username,password,page from users where username = '$user'";
	$tas = mysql_query($wela);
	$message = "Access Denied";
	while ($vid = mysql_fetch_assoc($tas))
	{
		$perm = $vid['page'];
	}
	
	//if($perm!='pharmacy') 
	if($perm!='admin')
	{   print '<div id = "jim">';
		print '<h1>' .$message.'</h1>';
		print '</div>';
		
		exit();
	}

        
        
        
        ?>
        <form action="mrevs.php" method="post" id="mini">
            <label>Month</label><br>
            <input type="text" name="dte" id="dte"><br>
            
            <label>Year</label><br>
            <input type="number" name="yr" id="dte"><br>
            
            
            <input type="submit" value="Preview">
        </form>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         
         $date = $_POST['dte'];
         $yr = $_POST['yr'];
        $sqlx = "select productcode,qtysold,unitprice,unitcost, qtysold * unitprice as extended,qtysold * unitcost as cost,qtysold * unitprice -qtysold * unitcost as profit from dailies where monthname(ddate) = '$date' and year(ddate)= '$yr' and qtysold > 0";
        $sqlxx = "select sum(qtysold * unitprice -qtysold * unitcost) as profit from dailies where monthname(ddate) = '$date' and year(ddate)= '$yr'";
        
        $rez = mysql_query($sqlx);
         $opo = mysql_query($sqlxx);
         $prof = mysql_fetch_assoc($opo);
         $profit = $prof['profit'];
         
         //echo $profit;
         
         
         
         $res = mysql_query($sqlx);
         
         
                    $buns = mysql_num_fields($res);
                echo '<table id = diaga title = "MONTHLY PROFIT">';
                
                
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
    echo 'Profit For The Month';
    echo '</td>';
    echo '<td>';
    echo number_format($profit);
    echo '</td>';
    
    echo '</tr>';
     
                
   
    
    echo '</table>';
 
         
         
         
        ?>
        
        <script type="text/javascript">
	$("#diaga").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"760",
			    position:"right top"
			    
			    	
			}
			
			);
	</script> 
        
        <script type="text/javascript">
	$("#mini").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"460",
			    position:"left top"
			    
			    	
			}
			
			);
	</script> 
        
        
    </body>
</html>
