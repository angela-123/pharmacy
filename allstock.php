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
                height: 50px;
                border:1px #aaaaaa solid;
            }
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        <script>
            $(document).ready(function(){
                
                $("#save").click(function(){
                    var date = $("#dte").val();
                    var pcode = $("#pcode").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"allsax.php",
                        data:"date="+date+"&pcode="+pcode,
                        
                        success:function(data)
                        {
                            $("#pesos").html(data);
                        },
                        
                        error:function()
                        {
                            alert(new Date());
                        }
                    });
                    
                });
                
            });
        </script>
        <form id="bambi" title="SEARCH BOX">
            
            <label>Date</label><br>
            <input type="date" name="dte" id="dte"><br>
            <label>Productname</label><br>
            <input type="text" name="pcode" id="pcode" size="40"><br>
            <input type="button" value="search" id="save">
        </form>
        <div id="pesos"></div>
        <script type="text/javascript">
$("input#pcode").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "pharmcroo.php",
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

<script type="text/javascript">
	$("#bambi").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"490",
			    position:"left top"
			    
			    	
			}
			
			);
	</script>


    </body>
</html>
