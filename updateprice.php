<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>STOCK UPDATE</title>
        <style>
            input[type = "button"]
            {
                width: 120px;
                height: 60px;
                border: 1px #e5e5e5 solid;
                background: orange;
            }

           #jim{
            position:absolute;
            left:500PX;
            top:350PX;
            color:red;
            font-size:38pt;
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
                    
                    var pname = $("#pname").val();
                    var newstock = $("#newstock").val();
                    var rate = $("#rate").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"bouncer.php",
                        data:"pname="+pname+"&newstock="+newstock+"&rate="+rate,
                        
                        
                        success:function(data)
                        {
                            $("#minsk").html(data);
                        },
                        
                        error:function()
                        {
                            alert(new Date());
                        }
                        
                    });
                    
                });
                
                $("#pname").click(function(){
                    
                    var pname = $("#pname").val();
                    var rate = $("#rate").val();
                    
                    $.ajax({
                        type:"post",
                        url:"digama.php",
                        data:"pname="+pname+"&rate="+rate,
                        
                        success:function(data)
                        {
                            $("#minsk").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#minsk").html('Not Connected');
                        }
                    });
                    
                    
                    
                });
                
            });
        </script>
        <div class = "container-fluid">
            <div class = "row">
                <div class = "col-md-3">
            <label>Productname</label>
            <input type="text"  id="pname" class = "form-control">
            <label>New Price</label>
            <input type="number" id="rate" class = "form-control">
            
            <input type="button" id="btn" value="Save" class = "btn btn-primary btn-lg">
            
        </div>
        <div id = "minsk" class = "col-md-6">
            
        </div>
        </div>
        </div>

        
        
                                   		                           <script type="text/javascript">
$("input#pname").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "stockcroo.php",
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
        
        
        
        <?php
        
        ?>
        
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
        
    </body>
</html>
