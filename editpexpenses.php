<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>EXPENSES EDIT</title>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        
        <script>
            $(document).ready(function(){
                
                $("#btn").click(function(){
                    var date = $("#date").val();
                    var expid = $("#expid").val();
                    var amt = $("#amt").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"editexp.php",
                        data:"date="+date+"&expid="+expid+"&amt="+amt,
                        
                        success:function(data)
                        {
                            $("#miko").html(data);
                        },
                        
                        
                        
                        error:function()
                        {
                            $("#miko").html('Not Connected');
                        }
                    });
                    
                });
                
                
                $("#btp").click(function(){
                    
                    var date = $("#date").val();
                    var expid = $("#expid").val();
                    var amt = $("#amt").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"expido.php",
                        data:"date="+date+"&expid="+expid+"&amt="+amt,
                        
                        success:function(data)
                        {
                            $("#miko").html(data);
                        },
                        
                        
                        
                        error:function()
                        {
                            $("#miko").html('Not Connected');
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
                        <input type="date" id="date" class="form-control">
                        <label>ExpensesId</label>
                        <input type="number" id="expid" class="form-control">
                        <label>Amount</label>
                        <input type="number" id="amt" class="form-control">
                        <input type="button" id="btn" class="btn btn-default btn-lg" value="Search" style=" background:  #49afcd;">
                        <input type="button" id="btp" class="btn btn-default btn-lg" value="Update">
                        
                    </div>
                    
                </div>
                <div id="miko" class="col-md-4"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
