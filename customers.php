<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CUSTOMERS</title>
        <style>
            input[type = "button"]
            {
                width: 120px;
                height: 50px;
                border: 1px #363636 solid;
            }
            
            th{
                text-align: left;
                color:  #0000ff;
                width: 450px;
                
            }
            
            td{
                color:  #0055cc;
                border: 1px #363636 solid;
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
                    
                    var cname = $("#cname").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"custs.php",
                        data:"cname="+cname,
                        
                        success:function(data)
                        {
                            $("#fila").html(data);
                            $("#cname").val('');
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
            <label>Customername</label>
            <input type="text" name="cname" id="cname" class = "form-control">
            <input type="button" id="btn" value="Save" class = "btn btn-primary btn-lg">
        
        </div>
        <div id = "fila" class = "col-md-4">
            
        </div>
        </div>
        </div>
    
       
    
        
    
        
        
    </body>
</html>
