<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
        <title></title>
 <script src="libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script src="libs/jquery-ui-1.10.0.custom.min.js"></script>
        
        
    </head>
    <body>
        
        <script>
            $(document).ready(function(){
                
                $("#btp").click(function(){
                    
                    var loc = $("#loc").val();
                    var recby = $("#recby").val();
                    var cc = $("#cc").val();
                    var details = $("#details").val();
                    var amount = $("#amount").val();
                    
                    $.ajax({
                        type:"post",
                        url:"exp.php",
                        data:"loc="+loc+"&recby="+recby+"&cc="+cc+"&details="+details+"&amount="+amount,
                        
                        
                        success:function(data)
                        {
                            $("#gmg").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#gmg").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                       
                        <label>Received By</label>
                        <input type="text" id="recby" class="form-control">
                        
                        <label>Cost Center</label>
                        <input type="text" id="cc" class="form-control">
                        <label>Details</label>
                        <input type="text" id="details" class="form-control">
                        <label>Amount</label>
                        <input type="number" id="amount" class="form-control">
                        <input type="button" id="btp" class="btn btn-primary btn-lg" value="Update">
                        
                    </div>
                    
                </div>
                
                <div id="gmg" class="col-md-6"></div>
                
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
        
                                                                                    		                           <script type="text/javascript">
$("input#recby").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "lumstaff.php",
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

                                                                                    		                           <script type="text/javascript">
$("input#cc").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "ccc.php",
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
