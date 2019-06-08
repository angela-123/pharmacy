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
            #btn{
                
                width: 150px;
                height: 70px;
            }
            
            th{
                
                width: 600px;
            }
            
            td{
                
                border: 1px #009999 solid;
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
                    
                    var pcode = $("#pdname").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"phistory.php",
                        data:"pcode="+pcode,
                        
                        success:function(data)
                        {
                            $("#tao").html(data);
                        },
                        
                        error:function()
                        {
                            alert(new Date());
                        }
                    });
                    
                    
                    
                    
                });
                
            });
        </script>
        
        <form id="dialog">
            <label>Productname</label><br>
            <input type="text" id="pdname" placeholder="select drugname" size="40"><br>
            <input type="button" id="btn" value="Preview">
        </form>
        
        <div id="tao" title="DRUG PURCHASES HISTORY"></div>
        <div id="tara"></div>
                                    		                           <script type="text/javascript">
$("input#pdname").autocomplete ({
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
        
        <script type="text/javascript">
	$("#dialog").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"400",
                    
			    position:"left top"
			    
			    	
			}
			
			);
	</script>
        
        <script type="text/javascript">
	$("#tao").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"750",
                    
			    position:"right top"
			    
			    	
			}
			
			);
	</script>
        
    </body>
</html>
