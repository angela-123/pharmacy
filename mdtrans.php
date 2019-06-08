<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>DAILY TRANSACTIONS REPORT</title>
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
                    
                    var mnt = $("#mnt").val();
                    var yr = $("#yr").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"mtrans.php",
                        data:"mnt="+mnt+"&yr="+yr,
                        
                        success:function(data)
                        {
                            $("#farj").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#farj").html('Not Connected');
                        }
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Month</label>
                        <input type="date" id="mnt" class="form-control">
                        <label>Year</label>
                        <input type="date" id="yr" class="form-control">
                        
                        <input type="button" id="btn" class="btn btn-default btn-lg" value="Search">
                    </div>
                    
                </div>
                <div id="farj" class="col-md-5"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
