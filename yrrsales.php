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
                font-size: 1.2em;
                color:  black;
                border: 1px #aaaaaa solid;
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

                var year = $("#dte").val();

                $.ajax({
                    type:"post",
                    url:"yrs.php",
                    data:"year="+year,

                    success:function(data)
                    {
                        $("#chike").html(data);
                    },

                    error:function()
                    {
                        $("#chike").html('Not Connected');
                    }
                })
            })
        })
            
        </script>
        
            <div class = "container-fluid">
            <div class = "row">
             <div class = "col-md-3">
            
            <label>Year</label>
            <input type="number" name="yr" id="dte" class = "form-control">
            
            
            <input type="button" value="Preview" id = "btn" class = "btn btn-primary btn-lg">
        
        </div>
        <div id = "chike" class = "col-md-7"></div>
        </div>
        </div>
        
        
  
        
    
        
        
    </body>
</html>
