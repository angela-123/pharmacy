<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>DAILY RETURNS</title>
        
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
                
                $("#btx").click(function(){
                    
                    var pname = $("#pcode").val();
                    var date = $("#dte").val();
                    var qty = $("#qty").val();
                    var rate = $("#rate").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"rets.php",
                        data:"pname="+pname+"&date="+date+"&qty="+qty+"&rate="+rate,
                        
                        
                        success:function(data)
                        {
                            $("#blue").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#blue").html('Not Connected');
                        }
                    });
                    
                });
                
                $("#btp").click(function(){
                    
                    var pname = $("#pcode").val();
                    var date = $("#dte").val();
                    var qty = $("#qty").val();
                    var rate = $("#rate").val();
                    
                    $.ajax({
                        type:"post",
                        url:"retx.php",
                        data:"pname="+pname+"&date="+date+"&qty="+qty+"&rate="+rate,
                        
                        
                        success:function(data)
                        {
                            $("#blue").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#blue").html('Not Connected');
                        }
                    });
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" id="dte" class="form-control">
                        <label>Productcode</label>
                        <input type="text" id="pcode" class="form-control">
                        
                         <label>Qty</label>
                        <input type="text" id="qty" class="form-control">
                         <label>Rate</label>
                        <input type="text" id="rate" class="form-control">
                         <input type="button" id="btx" class="btn btn-default btn-lg" value="Preview" style=" background:  #009999;">
                        <input type="button" id="btp" class="btn btn-default btn-lg" value="Return Item" style=" background:  #009999;">
                        
                    </div>
                    
                </div>
                <div id="blue" class="col-md-5"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
        <script>
        $("input#pcode").autocomplete ({
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

        
        
    </body>
</html>
