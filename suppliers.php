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
            label{
                font-family:  sans-serif;
                font-size: 10pt;
                color:  #000099;
                font-weight: bold;
            }
            
           th{
                background:navy;
                text-align:  left;
                font-family:  monospace;
                color: white;
                font-size: 1.2em;
                
            }
            
            td{
                font-family:  sans-serif;
                font-size: 1.1em;
                color: black;
                border: 1px #535353 solid;
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
                var supname = $("#supname").val();
                var add = $("#add").val();
                var email = $("#email").val();
                var phone = $("#phone").val();

                $.ajax({
                    type:"post",
                    url:"sups.php",
                    data:"supname="+supname+"&add="+add+"&email="+email+"&phone="+phone,

                    success:function(data)
                    {
                        $("#kelvin").html(data);
                    },

                    error:function()
                    {
                        $("#kelvin").html('Not Connected');
                    }
                })
            })
        })
        
    </script>
        
               <div class = "container-fluid">
                   <div class = "row">
                       <div class = "col-md-3">
                <label>Suppliername</label>
                <input type="text" name="supname" id="supname" class = "form-control">
                <label>Address</label>
                <input type="text" name="add" id="add" class = "form-control">
                <label>Email</label>
                <input type="email" name="email" id="email" class = "form-control">
                <label>Phone#</label>
                <input type="text" name="phone" id="phone" class = "form-control">
                <input type="button" value="save" id = "btn" class = "btn btn-primary btn-lg">
        </div>

        <div class = "col-md-5" id = "kelvin">
            
        </div>
        </div>
        </div>
        
        
     
        
    
    
        
    </body>
</html>
