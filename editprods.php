<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>EDIT PRODUCTS</title>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
        
    </head>
    <body>
        
        <script>
            $(document).ready(function(){
                
                $("#btn").click(function(){
                    
                    var pname = $("#pname").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"editpd.php",
                        data:"pname="+pname,
                        
                        success:function(data)
                        {
                            $("#slist").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#slist").html('Not Connected');
                        }
                        
                    });
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"edes.php",
                        data:"pname="+pname,
                        
                        success:function(data)
                        {
                            $("#dlist").html(data);
                        },
                        
                        error:function()
                        {
                            $("#dlist").html('Not Connected');
                        }
                    });
                    
                });
                
                
                
                $("#bts").click(function(){
                    
                    var pname = $("#pname").val();
                    var name = $("#nname").val();
                    
                    $.ajax({
                        type:"post",
                        url:"edx.php",
                        data:"pname="+pname+"&name="+name,
                        success:function(data)
                        {
                            $("#slist").html(data);
                        },
                        
                        error:function()
                        {
                            $("#slist").html('Not Connected');
                        }
                    });
                    
                });
                
                
                
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4">
                    <label>Product Name</label>
                    <input type="text" id="pname" class="form-control">
                    
                    <label>New  Name</label>
                    <input type="text" id="nname" class="form-control">
                    <input type="button" id="btn" class="btn btn-default btn-lg" value="Search" style=" background:  #adadad;">
                    <input type="button" id="bts" class="btn btn-default btn-lg" value="Update" style=" background:  #adadad;">
                        
                  
                    
                </div>
                </div>
            </div>
            
            <div class="row">
                <div id="slist" class="col-md-5"></div>
                <div id="dlist" class="col-md-5 col-md-offset-1"></div>
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
