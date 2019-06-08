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
            #dike{
                position:  absolute;
                left: 50px;
                top:50px;
                width: 500px;
                height: 400px;
                
            }
            
            
            #nene{
                
                position: absolute;
                top: 50px;
                width: 500px;
                left: 550px;
            }
            
            th{
                
                color:  #ee5f5b;
                font-size: 10pt;
                
                
            }
            
            input[type = "button"]
            {
                width: 120px;
                height: 50px;
                font-size: 11pt;
                font-weight:  bold;
                
            }
            
            label{
                font-size: 12pt;
                font-weight: bold;
                color:  #000099;
            }
            
           
            
            h3{
                
                color:  yellow;
            }
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        <script>
            $(document).ready(function(){
                 $("#save").click(function()
                 {
                var date = $("#dte").val();
                var supname = $("#supname").val();
                var pmt = $("#pmt").val();
                
                $.ajax({
                    
                    type:"post",
                    url:"pipi.php",
                    data:"date="+date+"&supplier="+supname+"&payment="+pmt,
                    
                    success:function(data)
                    {
                        $("#nene").html(data);
                    },
                    
                    error:function(data)
                    {  
                        alert('Bros go, no go');
                        $("#nene").html(data);
                    }
                    
                });
                
                 });
                 
                 
                 $("#view").click(function(){
                     
                     var invoice = $("#invoice").val();
                     var spname = $("#supname").val();
                     
                     $.ajax({
                         type:"post",
                         url:"star.php",
                         data:"invoice="+invoice+"&spname="+spname,
                         
                         success:function(data)
                         {
                             $("#nene").html(data);
                         },
                         
                         error:function()
                         {
                             alert('No Network');
                         }
                         
                     });
                     
                 });
                
                
            });
        </script>
        <div class = "container-fluid">
            <div class = "row">
                <div class = "col-md-3">
            <label>Date</label>
            <input type="date" name="dte" id="dte" class = "form-control">
            <label>Suppliername</label>
            <input type="text" name="supname" id="supname" class = "form-control">
            <label>Invooice#</label>
            <input type="text" id="invoice" placeholder="invoice number" class = "form-control">
            <label>Payment</label>
            <input type="number" name="pmt" id="pmt" class = "form-control">
            <input type="button" value="save" id="save" class = "btn btn-primary btn-lg">
            <input type="button" value="view invoice" id="view" class = "btn btn-primary btn-lg">
            
        
                                   		                           <script type="text/javascript">
$("input#supname").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "supcroo.php",
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

        <div id="nene">
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
