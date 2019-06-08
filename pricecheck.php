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
            input[type = "button"]
            {
                width: 120px;
                height: 60px;
            }
            
            input[type = "text"]
            {
                font-size: 0.67em;
            }
            
            #dx{
                font-size: 17px;
                font-weight:  bolder;
            }
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        <script>
            $(document).ready(function(){
                
                $("#btn").click(function(){
                    
                    var dname = $("#dname").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"check.php",
                        data:"dname="+dname,
                        
                        success:function(data)
                        {
                          $("#mx").html(data);
                          //alert($("#mx").html(data).text);
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
            <input type="button" value="Search" id="btn" class = "btn btn-primary btn-lg">
        </div>
        <div id = "mx" col-md-6>
            
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

    </body>
    
   
    
        
   
        
        
</html>
