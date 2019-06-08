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

        <script>
        $(document).ready(function(){
          $("#btn").click(function(){

            var date = $("#dtx").val();
            var dtx = $("#dtx").val();

            $.ajax({
                type:"post",
                url:"revs.php",
                data:"date="+date+"&dtx="+dtx,

                success:function(data)
                {
                    $("#marietta").html(data);
                },

                error:function()
                {
                    $("#marietta").html('Not Connected');
                }

            })
          })
            
        })
            
        </script>
         <div class = "container-fluid">
         <h2>PROFIT REPORTING</h2>
            <div class = "row">
            <div class = "col-md-3">
            <label>Beginning Date</label>
            <input type="date" name="dte" id="dte" class = "form-control">
            <label>End Date</label>
            <input type="date" name="dtx" id="dtx" class = "form-control">
            <input type="button" value="Preview" class = "btn btn-primary btn-lg" id = "btn">
        
        </div>

        <div id = "marietta" class = "col-md-7">
            
        </div>
        </div>
        </div>
        
   
   
        
        <script>
            $(function(){
                
                $("#dte").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script>
<script>
            $(function(){
                
                $("#dtx").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script>


    </body>
</html>
