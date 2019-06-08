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
            button{
                width: 100px;
                height: 50px;
                border: 1px #004099 solid;
                background: #0055cc;
            }
            
            #mama{
                position:  absolute;
                bottom: 320px;
                background:  #da4f49;
                font-size: 12pt;
            }
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
        
    </head>
    <body>
        
        <script>
            function sell(name,qty)
            {
                var name = name;
                //var price = price;
                var qty = qty;
                
                $.ajax({
                    type:"post",
                    url:"debo.php",
                    data:"name="+name+"&qty="+qty,
                    
                    success:function(data)
                    {
                        $("#car").html(data);
                    },
                    
                    error:function()
                    {
                        alert(new Date());
                    }
                    
                });
            }
        </script>
            
        <div id="mule">
            <button id="7up" class="btn" value="7up" onclick="sell('7up',1)">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1)">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1)">Star</button><br>
            <button id="gulder" class="btn" value="gulder" onclick="sell('Gulder',1)">Gulder</button>
            
        </div>
        <div id="car"></div>
        <?php
        
        ?>
        
        <script type="text/javascript">
	$("#car").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"460",
			    position:"right top"
			    
			    	
			}
			
			);
	</script>
        
    </body>
</html>
