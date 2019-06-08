<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>MENU LIST</title>
        <style>
            th{
                width: 550px;
                text-align: left;
                font-family:  sans-serif;
                font-size: 10pt;
                font-weight:  bold;
            }
            label{
                font-size: 10pt;
                color:  #004099;
                font-weight:  bold;
            }
            
            li{
                font-size: 11pt;
                font-weight:  bolder;
                
            }
            
            input[type = "submit"]
            {
                width: 100px;
                height: 50px;
                background:  #999999;
                border: 0px;
            }
            
            #diagas td{
                font-size: 10pt;
                font-weight:  normal;
            }
            
            #diaga td{
                font-size: 8pt;
                border: 1px;
            }
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
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
    <body>
        <form action="pharmitems.php" method="post" id="dialog" title="REGISTER MENU ITEMS">
            <label>Product Code</label><br>
            <input type="text" name="mnt" id="mnt"><br>
            
            <label>Product Name</label><br>
            <input type="text" name="pname" id="mnt"><br>
            <label>Opening Stock</label><br>
            <input type="number" name="opstock"><br>
            <label>Stock Balance</label><br>
            <input type="number" name="bal"><br>
            <label>Expiry Date</label><br>
            <input type="date" name="dte"><br>
            <input type="submit" value="Save">
        </form>
        <?php
      $nas = mysql_connect('localhost','staff','angela');
      mysql_select_db(pharmacy);
      
      
      
      $code = $_POST['mnt'];
      $name = $_POST['mname'];
      $rate = $_POST['rate'];
      $opstock = $_POST['opstock'];
      $exp = $_POST['dte'];
      $bal = $_POST['bal'];
      
      $fet = "select * from products where productcode = '$code'";
      
      $zw = mysql_query($fet);
      $jax = mysql_fetch_assoc($zw);
      $pname = $jax['productname'];
      $uprice = $jax['unitprice'];
      $ucost = $jax['unitcost'];
      $ify = "select * from products where productcode = '$code'";
      
      //$erd = mysql_query($ify) or die('cant select');
      
      
      $det = "insert into items(productcode,productname,rate,unitcost,opstock,expirydate)values('$code','$pname','$uprice','$ucost', '$opstock','$exp')";
      $ter = "insert into stock(date,productcode,productname,opstock,balance)values(CURDATE(),'$code','$pname','$opstock','$bal')";
      $dal = "insert into dailies(ddate,productcode,productname,opstock)values(CURDATE(),'$code,'$pname','$opstock')";
      $deep = "insert into stockbal(productcode,productname,rate,balance)values('$code','$pname','$uprice','$opstock')";
       $res = mysql_query($det);
       $zion = mysql_query($dal);
       mysql_query($ter);
       mysql_query($deep);
       
        ?>
        
        <?php
  
        ?>
        
        <?php 
         $riva = "select * from items where productcode!=''";
         $disk = mysql_query($riva);
         
         
             	echo '<table id = "diagas" title = "MENU">';
            
//echo '<caption>DAILY EXPENSES</caption>';
echo '<tr>';
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($disk, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($disk))
{
	echo '<tr >';
	
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
      echo '</tr>'; 
      
     
    
    echo '</table>';
        
         
         
        ?>
        
                <script type="text/javascript">
$("input#mnt").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "lapii.php",
data : data,
complete : function (xhr, result)
{
if (result !== "success") return;
var response = xhr.responseText;
var books = [];
$(response).filter ("li").each (function ()
{
books.push ($(this).text ());
});
callback (books);
}
});
}
});
</script>
        
        
          <script type="text/javascript">
	$("#dialog").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"560",
			    position:"left top"
			    
			    	
			}
			
			);
	</script>
        
          <script type="text/javascript">
	$("#diaga").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"560",
			    position:"left bottom"
			    
			    	
			}
			
			);
	</script>
        
        
          <script type="text/javascript">
	$("#diagas").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"560",
			    position:"right top"
			    
			    	
			}
			
			);
	</script>
        
        
        
    </body>
</html>
