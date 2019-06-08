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
                               <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        <script>
            $(document).ready(function(){
                
                var qtr = $("#qtrr").val();
               
                
                $("#btn").click(function(){
                    
                    $.ajax({
                    type:"post",
                    url:"cy.php",
                    data:"qtrr="+qtr,
                    
                    
                    success:function(data)
                    {
                        $("#nkr").html(data);
                    },
                    
                    
                    error:function()
                    {
                        $("#nkr").html('Not Connected');
                    }
                    
                    
                });
                    
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <label>Quarter</label>
                    <input type="number" id="qtrr" class="form-control">
                    <input type="button" id="btn" class="btn btn-primary btn-lg" value="Preview">
                    
                </div>
                <div id="nkr" class="col-md-6"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
