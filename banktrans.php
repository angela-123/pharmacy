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
        
        
    </head>
    <body>
        
        <script>
            
            $(document).ready(function(){
                
                $("#btx").click(function(){
                    
                    var date = $("#dte").val();
                    var bank = $("#bank").val();
                    var details = $("#det").val();
                    var amount =$("#amt").val();
                    
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"bankers.php",
                        data:"date="+date+"&bank="+bank+"&details="+details+"&amount="+amount,
                        
                        
                        success:function(data)
                        {
                            $("#oga").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#oga").html('Not Connected');
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
                        <label>Bank</label>
                        <input type="text" id="bank" class="form-control">
                        <label>Details</label>
                        <input type="text" id="det" class="form-control">
                        <label>Amount</label>
                        <input type="number" id="amt" class="form-control">
                        
                        <input type="button" id="btx" class="btn btn-default btn-lg" value="Update" style=" background:  #009999;border: 0px #0088cc solid;">
                    </div>
                    
                </div>
                
                
                <div id="oga" class="col-md-5"></div>
                
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
