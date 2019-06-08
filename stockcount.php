<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>STOCK TAKING</title>
        <style>
            #btc{
                
                width: 160px;
                height: 60px;
            }
            
            th{
                
                width: 880px;
                color:  #000099;
                border: 1px #009999 solid;
                font-size: 12pt;
                font-weight: bold;
            }
            
            td{
                border: 1px #0480be solid;
                color:  #414141;
                font-weight:  bold;
                font-style: italic;
            }
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        <script>
            $(document).ready(function(){
                
                $("#btc").click(function(){
                    
                    var prod = $("#pname").val();
                    var stock = $("#nstock").val();
                    var date = $("#date").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"counts.php",
                        data:"prod="+prod+"&stock="+stock+"&date="+date,
                        
                        success:function(data)
                        {
                            $("#tira").html(data);
                            $("#pname").val('');
                            $("#stock").val('');
                        },
                        
                        error:function()
                        {
                            alert(new Date());
                        }
                        
                    });
                    
                    
                    
                    
                });
                
                $("#pname").click(function(){
                    
                    var pcode = $("#pname").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"tesi.php",
                        data:"pcode="+pcode,
                        
                        
                        success:function(data)
                        {
                            $("#zuhu").html(data);
                            
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class = "container-fluid">
          <div class = "row">
          <div class = "col-md-3">
            <label>Date</label>
            <input type="date" id="date" class = "form-control">
        <label>Productcode</label>
        <input type="text" id="pname" class = "form-control">
        <label>New Stock</label>
        <input type="number" id="nstock" class = "form-control">
        <input type="button" id="btc" value="Update" class = "btn btn-primary btn-lg">
        
    </div>
    <div id = "tira" class = "col-md-6">
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

  
<script>
            $(function(){
                
                $("#date").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script>

  
        
        
    </body>
</html>
