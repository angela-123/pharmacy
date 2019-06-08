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
            #fex{
                position:  absolute;
                top: 400px;
                left: 650px;
                border: 0px #003580 solid;
                width: 100px;
                height: 200px;
            }
            
            
            label{
                font-size: 18pt;
                font-weight:  bolder;
                color: #0000cc;
            } 
            
            
            input[type = "button"]
            {
                width: 120px;
                height: 60px;
                border: 1px #46a546 solid;
                background:  #51a351;
                font-size: 13pt;
                font-weight:  bolder;
                color:  #000099;
            }
            
            body{
                background: palevioletred;
            }
            
            #tuliop{
                position: absolute;
                left: 400px;
                top:250px;
                color: red;
                font-size: 35pt;
            }
        </style>
        
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        
        <script>
            $(document).ready(function(){
            $("#save").click(function()
            {  
                
               //var date = $("#dte").val();
               var username = $("#usname").val();
               var password = $("#pswd").val();
               //var payment = $("#amt").val();
               
               //var qty = $("#qty").val();
              
              //var recno = $("#recno").val();
              
                
                $.ajax({
                    type:"POST",
                    url:"jogged.php",
                    //data:"rdate="+date+"&guestname="+gname+"&menuitem="+kode+"&qty="+qty+"&rate="+rate+"&recno="+recno;
                    data:"username="+username+"&password="+password,
                     
                    success:function(data)
                    {
                       $("#info").html(data);
                       $("#tulio").html(data);
                       $("#fex").fadeOut(100);
                       
                       
                    },
                    
                    error:function(data)
                    {
                        $("#info").html(data);
                        
                        
                    }
                    
                    
                });
            }
                    
                    );
            
    });
        </script>
        
        <form id="fex">
            <label>Username</label><br>
            <input type="text" name="usname" id="usname"><br>
            <label>Password</label><br>
            <input type="password" name="pswd" id="pswd"><br>
            <input type="button" value="login" id="save">
            <div id="info"></div>
            
        </form>
        <div id="tulio">
            
        </div>
        
        

      <script type="text/javascript">
	$("#flex").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"560",
			    position:"center"
			    
			    	
			}
			
			);
	</script>
        
        
    </body>
</html>
