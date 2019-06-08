<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CREATE USERS</title>
       
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
                
                $("#btu").click(function(){
                    var usname = $("#usname").val();
                    var pswd =$("#pswd").val();
                    var status = $("#status").val();
                    var loc = $("#loc").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"userpost.php",
                        data:"usname="+usname+"&pswd="+pswd+"&status="+status+"&loc="+loc,
                        
                        success:function(data)
                        {
                            $("#luger").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#luger").html('Not Connected');
                        }
                        
                        
                    });
                    
                });
                
                
            });
        </script>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" id="usname" class="form-control" placeholder="username">
                        <label>Password</label>
                        <input type="password" id="pswd" class="form-control" placeholder="password">
                        <label>Permission</label>
                        <input type="text" id="status" class="form-control" placeholder="access type">
                        <label>Location</label>
                        <select id="loc" class="form-control">
                            <option value="Abuja">Abuja</option>
                            <option value="Lagos">Lagos</option>
                            <option value="London">London</option>
                            <option value="New York">New York</option>
                        </select>
                        <input type="button" id="btu" class="btn btn-primary" value="Create User">
                        
                    </div>
                    
                </div>
                <div id="luger" class="col-md-4"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
