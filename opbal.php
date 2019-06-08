<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>OPENING BALANCE</title>
         <script src="libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script src="libs/jquery-ui-1.10.0.custom.min.js"></script>
        
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        
        <script>
            
            $(document).ready(function(){
                
                $("#btn").click(function(){
                    var date = $("#dte").val();
                    var opbal = $("#opbal").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"bal.php",
                        data:"date="+date+"&opbal="+opbal,
                        
                        
                        success:function(data)
                        {
                            $("#dalan").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#dalan").html('Not Connected');
                        }
                    });
                });
            });
        </script>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" id="dte" class="form-control">
                        <label>Opening Balance</label>
                        <input type="number" id="opbal" class="form-control">
                        <input type="button" id="btn" class="btn btn-default btn-lg" value="Update" style=" background:  #46b8da;">
                        
                    </div>
                    
                </div>
                <div id="dalan" class="col-md-5"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
