<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>DAILY SALES BY CASHIERS</title>
        <style>
            th{
                font-family:  sans-serif;
                font-size: 10pt;
                font-weight: bold;
                color:  indigo;
                background:  #d59392;
            }
            
            #diaga td{
                font-family: fantasy;
                font-size: 9pt;
                color:  #000099;
                border:1px #999 solid;
                
            }
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        <form action="dcredits.php" method="post" id="mili">
            <label>Date</label><br>
            <input type="date" name="dte"><br>
            
            <input type="submit" value="Preview">
        </form>
        <?php
         $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         
         $date = $_POST['dte'];
         $cashier = $_POST['cashier'];
         
         $gaf = "select ddate As date,customer,productname,qtysold,unitprice,qtysold * unitprice As Amount from dailies where  ddate = '$date' And qtysold > 0 and salestype = 'credit' and customer!='na'";
         $zam = "select SUM(qtysold * unitprice) As Total from dailies where ddate = '$date' and salestype = 'credit' and customer!='na'";
         $tram = mysql_query($zam);
         $trebor = mysql_fetch_assoc($tram);
         $total = $trebor['Total'];
         //echo $total;
         
         
                          $rda = mysql_query($gaf) or die('cant insert');
        
        
        $buns = mysql_num_fields($rda);
//$file_path = 'http://localhost/wmg/images/';

    	echo '<table id = "diaga" title = "SALES REPORT">';
            
            echo '<tr>';
            echo '<td>';
            echo 'Sales Analysis For:  ';
            echo '</td>';
            echo '<td>';
            echo $cashier;
            echo '</td>';
            echo '</tr>';
echo '<tr>';
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($rda, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($rda))
{
	echo '<tr >';
	
	for($i = 0;$i<$buns;$i++)
	
	{
		echo '<td>';
		if(is_numeric($row2[$i]))
		{
		echo number_format($row2[$i]);
		}
		
		else 
		{
			echo '<nobr>'. $row2[$i] . '</nobr>';
		}
	}   echo '</td>';
	echo '</tr>';
    }
      echo '</tr>'; 
      echo '<tr>';
     
      echo '<td>';
      echo 'Total Sales';
      echo '</td>';
      
       echo '<td>';
      echo number_format($total);
      echo '</td>';
      
      echo '</tr>';
     
    
    echo '</table>';
        
         
        ?>
        
                                    		                           <script type="text/javascript">
$("input#cashier").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "staffcroo.php",
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
	$("#diaga").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"460",
			    position:"right top"
			    
			    	
			}
			
			);
	</script>
        
        <script type="text/javascript">
	$("#mili").dialog(
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
