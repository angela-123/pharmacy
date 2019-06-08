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
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
        
    </head>
    <body>
        
        <script>
            $(document).ready(function(){
                
                $("#btx").click(function(){
                    
                    var pname = $("#pcode").val();
                    var date = $("#dte").val();
                    var qty = $("#qty").val();
                    var rate = $("#rate").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"prets.php",
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
                        url:"pretx.php",
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
