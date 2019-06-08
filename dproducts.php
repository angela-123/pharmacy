<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>DATA STORE</title>
        <style>
            label{
                
                font-size: 13pt;
                font-weight:  bold;
                color:  #004099;
            }
            
            
            input[type = "button"]
            {
                width: 120px;
                border: 2px #aaa solid;
                height: 60px;
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
                    var pcode = $("#pcode").val();
                    var pname = $("#pname").val();
                    var uprice = $("#uprice").val();
                    var ucost = $("#ucost").val();
                    var expiry = $("#expiry").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"initprods.php",
                        data:"pcode="+pcode+"&pname="+pname+"&uprice="+uprice+"&ucost="+ucost+"&expiry="+expiry,
                        
                        success:function(data)
                        {
                            $("#kono").html(data);
                        },
                        
                        error:function()
                        {
                           alert('I don get alert');
                        }
                    });
                    
                });
                
            });
        </script>
        <form id="jag" title="UPDATE DRUGS DATASTORE">
            <label>Productcode</label><br>
            <input type="text" name="pcode" id="pcode"><br>
            <label>Productname</label><br>
            <input type="text" name="pname" id="pname"><br>
            <label>Unitprice</label><br>
            <input type="number" name="uprice" id="uprice"><br>
            <label>Unitcost</label><br>
            <input type="number" name="ucost" id="ucost"><br>
            <label>Expiry Date</label><br>
            <input type="date" name="expiry" id="expiry"><br>
            <input type="button" value="Update" id="btn">
            <div id="kono"></div>
        </form>
        <?php
        // put your code here
        ?>
        
        
        
        <script type="text/javascript">
	$("#jag").dialog(
			{
				show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"400",
			    position:"left top"
			    
			    	
			}
			
			);
	</script>
        
    </body>
</html>
