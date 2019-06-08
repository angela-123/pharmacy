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
                
                text-align: left;
                color: darkblue;
            }
            
            
            td{
                font-size: 10pt;
                color:  darkred;
                border: 1px #aaaaaa solid;
            }
        </style>
                       <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
          <script src="js/bootstrap.min.js"></script>  
          <script src="js/jquery-1.11.3.js"></script>
        ‪<script src="js/bootstrap.min.js"></script>
        
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
        
        
        
        
        <script>
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
                        
		} 
		
		function saveToDatabase(editableObj,column,id) {
			$(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
                        
			$.ajax({
				url: "savemktreps.php",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(){
					$(editableObj).css("background","#FDFDFD");
				}        
		   });
		}
		</script>
        
        
        
        
        
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
        <form action="mrevox.php" method="post" id="mini">
            <label>Month</label><br>
            <input type="text" name="dte" id="dte"><br>
            
            <label>Year</label><br>
            <input type="number" name="yr" id="dte"><br>
            
            
            <input type="submit" value="Preview">
        </form>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         require_once('dbcontroller.php');
        $dbhandle = new DBController();
         $date = $_POST['dte'];
         $yr = $_POST['yr'];
        $sqlx = "select nrec,ddate, productname,qtysold,unitprice,unitcost, qtysold * unitprice as extended,qtysold * unitcost as cost,qtysold * unitprice -qtysold * unitcost as profit from dailies where monthname(ddate) = '$date' and year(ddate)= '$yr' and qtysold > 0";
        $sqlxx = "select sum(qtysold * unitprice -qtysold * unitcost) as profit from dailies where monthname(ddate) = '$date' and year(ddate)= '$yr'";
        
        $rez = mysql_query($sqlx);
         $opo = mysql_query($sqlxx);
         $prof = mysql_fetch_assoc($opo);
         $profit = $prof['profit'];
         
         $faq = $dbhandle->runquery($sqlx);
         
  
 
         
         
         
        ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-1">
       <table class="table table-responsive table-striped table-hover">
            
            <thead>
            <th class="table-header">Sales Id</th>
            <th class="table-header">Date</th>
            <th class="table-header">Productname</th>
            <th class="table-header">Qtysold</th>
            <th class="table-header">Unitprice</th>
            <th class="table-header">Unitcost</th>
            <th class="table-header">Extended</th>
           <th class="table-header">TotalCost</th>
            <th class="table-header">Profit</th>
            
            
            </thead>
            <tbody>
                 <?php
		  foreach($faq as $k=>$v) {
		  ?>
			  <tr class="table-row">
				<td><?php echo $k+1; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'ddate','<?php echo $faq[$k]["nrec"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["ddate"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'productname','<?php echo $faq[$k]["nrec"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["productname"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'qtysold','<?php echo $faq[$k]["nrec"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["qtysold"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'unitprice','<?php echo $faq[$k]["nrec"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["unitprice"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'unitcost','<?php echo $faq[$k]["nrec"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["unitcost"]; ?></td>
                                
                                <td contenteditable="true" onBlur="saveToDatabase(this,'extended','<?php echo $faq[$k]["nrec"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["extended"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'cost','<?php echo $faq[$k]["nrec"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["cost"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'profit','<?php echo $faq[$k]["nrec"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["profit"]; ?></td>
				
                                
				
			  </tr>
		<?php
		}
		?>
                          <tr>
                              <td>Total Profit For The Month</td>
                              <td><?php echo number_format($profit,2); ?></td>
                          </tr>
                          
                          
                          
            </tbody>
            
        </table>
                
                        </div>
                    </div>
                </div>
        
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
