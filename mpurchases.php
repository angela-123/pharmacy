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
                border: 1px #363636 solid;
            }
            
            td{
                font-size: 10pt;
                border: 1px #aaa solid;
                color:  #000099;
            }
        </style>
       
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
                    
                    var month = $("#mnt").val();
                    var year = $("#yr").val();
                    
                    $.ajax({
                        type:"post",
                        url:"mpurch.php",
                        data:"month="+month+"&yr="+year,
                        
                        success:function(data)
                        {
                            $("#jama").html(data);
                        },
                        
                        error:function()
                        {
                            alert('Nopee');
                        }
                    });
                     
                    
                });
                
            });
        </script>
        <div class = "container-fluid">
        <div class = "row">
        <div class = "col-md-3">
            <label>Month</label><br>
            <input type="text" name="mnt" id="mnt" class = "form-control">
            <label>Year</label>
            <input type="number" id="yr" class = "form-control">
            <input type="button" id="btn" value="Preview" class = "btn btn-primary btn-lg">
            </div>
            <div id = "jama" class = "col-md-6">
                
            </div>
            </div>
            </div>
            
        
        
        
       
     
        
    
        
        
    </body>
</html>
