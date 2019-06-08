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
                
                $("#btp").click(function(){
                    
                    var date = $("#dte").val();
                    var bal = $("#opbal").val();
                    var banks = $("#banks").val();
                    var cash = $("#cash").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"editor.php",
                        data:"date="+date+"&bal="+bal+"&banks="+banks+"&cash="+cash,
                        
                        success:function(data)
                        {
                            $("#kaka").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#kaka").html('Not Connected');
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
                        <label>Bank Lodgement</label>
                        <input type="number" id="banks" class="form-control">
                        <label>Cash Receipts</label>
                        <input type="number" id="cash" class="form-control">
                        
                        <input type="button" id="btp" class="btn btn-default btn-lg" value="Search">
                        
                    </div>
                    
                </div>
                <div id="kaka" class="col-md-4"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
