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
            
            
            input[type = "button"]
            {
                width: 120px;
                height: 60px;
                color:  #0000cc;
                
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
                    
                    var dname = $("#dname").val();
                    //var year = $("#yr").val();
                    
                    $.ajax({
                        type:"post",
                        url:"mhist.php",
                        data:"dname="+dname,
                        
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
            <label>Productname</label>
            <input type="text" name="dname" id="dname" class = "form-control">
            
            <input type="button" id="btn" value="Preview" class = "btn btn-primary btn-lg">
            
          </div>
          <div id = "jama" class = "col-md-4">
              
          </div>
          </div>
          </div>  
        
        
        
        
                                    		                           <script type="text/javascript">
$("input#dname").autocomplete ({
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
        
    
        
    </body>
</html>
