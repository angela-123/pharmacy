<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>OPENING STOCK</title>
        
    </head>
    <body>
        
        <script>
            
            $(document).ready(function(){
                
                $("#btp").click(function(){
                    
                    var pcode = $("#pcode").val();
                    var pname = $("#pname").val();
                    var opstock = $("#opstock").val();
                    var rate =  $("#rate").val();
                    var ucost = $("#ucost").val();
                    var exp = $("#exp").val();
                    var dept = $("#dept").val();
                    var date = $("#dte").val();
                    var ostock = $("#ostock").val();
                    
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"opstock.php",
                        data:"pcode="+pcode+"&pname="+pname+"&opstock="+opstock+"&rate="+rate+"&ucost="+ucost+"&exp="+exp+"&dept="+dept+"&date="+date+"&ostock="+ostock,
                        
                        
                        success:function(data)
                        {
                            $("#granted").html(data);
                            $("#pcode").val('');
                            $("#pname").val('');
                            $("#opstock").val('');
                            $("#ucost").val('');
                            $("#exp").val();
                            $("#rate").val('');
                            
                        },
                        
                        
                        error:function()
                        {
                            $("#granted").html('Not Connected');
                        }
                    });
                    
                    
                    $.ajax({
                         type:"post",
                         url:"kadana.php",
                         data:"pcode="+pcode,
                         
                         
                         success:function(data)
                         {
                             $("#sisi").html(data);
                         },
                         
                         error:function()
                         {
                             $("#sisi").html('Not Connected');
                         }
                        
                    });
                    
                });
                
                $("#pcode").click(function(){
                    
                    var pcode = $("#pcode").val();
                    
                    $.ajax({
                        type:"post",
                        url:"mota.php",
                        data:"pcode="+pcode,
                        
                        success:function(data)
                        {
                            $("#sisi").html(data);
                        },
                        
                        error:function()
                        {
                            $("#sisi").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    
                        
              <label>Product Code</label><br>
              <input type="text" name="pcode" id="pcode" class="form-control">
            
            
            <label>Opening Stock</label>
            <input type="number" id="opstock" class="form-control">
            
           
            
            <input type="button" value="Save" id="btp" class="btn btn-default btn-lg">
                    <div id="sisi"></div>      
                      
                   
                    
                </div>
                <div id="granted" class="col-md-7 col-md-offset-2"></div>
               
            </div>
            <div class="row">
            
            </div>
        </div>
         
        <?php
        // put your code here
        ?>
                                    		                           <script type="text/javascript">
$("input#pcode").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "aiceprods.php",
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
$("input#pname").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "aiceprods.php",
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
