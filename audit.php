<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>STOCK AUDIT</title>
        <style>
            input[type = "button"]
            {
                width: 120px;
                height: 60px;
                border: 1px #414141 solid;
            }
            
            
            th{
                text-align: left;
                font-size: 12pt;
                font-weight:  bold;
                color:  #003366;
                width: 598px;
                
            }
            
            
            td{
                font-size: 10pt;
                font-weight:  bold;
                color:  #000099;
                border: 1px #49afcd solid;
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
                    
                    var kode = $("#kode").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"myaudit.php",
                        data:"kode="+kode,
                        
                        success:function(data)
                        {
                            $("#mina").html(data);
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
            <label>Itemname</label>
            <input type="text" id="kode" name="kode" class = "form-control">
            <input type="button" value="Preview" id="btn" class = "btn btn-primary btn-lg">
        
        </div>
        <div class = "col-md-6" id = "mina">
            
        </div>
        </div>
        </div>
    
       
        
                            		                           <script type="text/javascript">
$("input#kode").autocomplete ({
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
