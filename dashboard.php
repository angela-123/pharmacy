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
        <script src="libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script src="libs/jquery-ui-1.10.0.custom.min.js"></script>
        
        
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
                    
                    var pname = $("#pname").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"toni.php",
                        data:"pname="+pname,
                        
                        success:function(data)
                        {
                            $("#miki").html(data);
                        },
                        
                        
                        error:function()
                        {
                            alert(new Date());
                        }
                        
                    });
                    
                });
            });
        </script>
        <div class = "container-fluid">
        <div class = "row">
        <div class = "col-md-3">
            <label>Productname</label><br>
            <input type="text" id="pname"  class="form-control"><br>
            <input type="button" id="btn" value="Preview" class="btn btn-primary btn-lg" style=" background: orangered">
        
        
    </div>
    <div id = "miki" class = "col-md-3">
        
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
        // put your code here
        ?>
    </body>
</html>
