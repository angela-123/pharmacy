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
                text-align:  left;
                color:  #000099;
                width: 480px;
            }
            
            
            td{
                border: 1px #e2e4e5 solid;
                color:  #444;
                
            }
            
            
            input[type = "button"]
            {
                width: 120px;
                height: 60px;
                border: 2px #e2e4e5 solid;
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
	
	//if($perm!='cashier') 
	if($perm!='admin')
	{   print '<div id = "jim">';
		print '<h1>' .$message.'</h1>';
		print '</div>';
		
		exit();
	}

        
        ?>
        
        <script>
           $(document).ready(function(){
               
               
               $("#btn").click(function(){
                   
                   var yr = $("#yr").val();
                   
                   $.ajax({
                       type:"post",
                       url:"yrlies.php",
                       data:"yr="+yr,
                       
                       
                       success:function(data)
                       {
                           $("#meah").html(data);
                       },
                       
                       error:function()
                       {
                           alert(new Date());
                       }
                   });
                   
               });
               
           }); 
           
        </script>
        <form id="maya" title="SEARCH BOX">
        <label>Year</label><br>
        <input type="number" id="yr"><br>
        <input type="button" id="btn" value="Preview">
    </form>
        
        <div id="meah"></div>
        
        <?php
        
        ?>
        <script type="text/javascript">
	$("#meah").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"490",
			    position:"right top"
			    
			    	
			}
			
			);
	</script> 
        
        
        <script type="text/javascript">
	$("#maya").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"490",
			    position:"left top"
			    
			    	
			}
			
			);
	</script> 
        
        
        
    </body>
</html>
