<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html ng-app = "myApp">
    <head>
        <meta charset="UTF-8">
        <title>TROVELA</title>
        <style>
            #fex{
                
               
                border: 0px #c09853 solid;
                
            }
            
            #arama{
                
                font-size: 2.5em;
               
                
            }
            input[type = "button"]{
                width: 100px;
                height: 50px;
                border: 1px #fef1ec solid;
                background:  #7699d1;
                font-size: 12pt;
            }
            
            h3{
                position: absolute;
                left: 390px;
                top:200px;
                color:  #c43c35;
            }
            
            label{
                font-size: 14pt;
                color: darkred;
                font-weight:  bold;
            }
            
            #mid{
                position: relative;
                left: 100px;
                top:40px;
            }
            
            body{
                background:white;
            }
            
            #tuliop{
                position: absolute;
                left: 400px;
                top:250px;
                color: red;
                font-size: 35pt;
            }
            
            
            input[type = "text"]
            {
                font-size: 11pt;
                color:darkblue;
            }
        </style>
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
          <script src="js/bootstrap.min.js"></script>  
          <script src="js/jquery-1.11.3.js"></script>
          
        ‪<script src="js/bootstrap.min.js"></script>
    </head>
    <body id = "cool">
        
        <script>
            $(document).ready(function(){
            $("#save").click(function()
            {  
                
               //var date = $("#dte").val();
               var username = $("#usname").val();
               var password = $("#pswd").val();
               //var shift = $("#shift").val();
               
               //var qty = $("#qty").val();
              
              //var recno = $("#recno").val();
              
                
                $.ajax({
                    type:"POST",
                    url:"newjogger.php",
                    //data:"rdate="+date+"&guestname="+gname+"&menuitem="+kode+"&qty="+qty+"&rate="+rate+"&recno="+recno;
                    data:"username="+username+"&password="+password,
                     
                    success:function(data)
                    {
                       $("#cool").html(data);
                       //$("#tulio").html(data);
                       
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
        <div class="container-fluid">
            <br><br>
        <div id="fex" class="row">
            
            <div id="midd" class="form-group col-md-4 col-lg-4 col-md-offset-3" >
                <img src="images/vitamins.png" alt="drugspic" class = "img img-responsive img-rounded col-md-offset-3">
                <label class="form-control" style=" text-align:  center; color:  #000099; font-size: 1.5em; background:orangered;">TROVELA<sub>login page</sub></label>
                <label class="form-control" style=" background:black;color:white;">Username</label>
                <input type="text" name="usname" id="usname" class="form-control">
                <label class="form-control" style=" background:black;color:white;">Password</label>
                <input type="password" name="pswd" id="pswd" class="form-control">
            
                <input type="button" value="login" id="save" class="btn bg-primary btn-lg" style = "background:black;color:white;">
            <div id="info"></div>
            </div>
            
        </div>
        </div>
        <div id="tulioo">
        </div>
        
        </script>

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
