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
            .mija{
                width: 100px;
                height: 60px;
                border: 1px #b81900 solid;
                background:  #2d6987;
            }
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
        
    </head>
    <body>
        <script>
            $(document).ready(function(){
            $(".mija").click(function()
            {  
                
               var tdate = $("#dte").val();
               //var guestname = $("#gname").val();
               tdate = '2015-06-21';
               var code = $("#kode").val();
               //var rate = $("#rate").val();
               code = 'Amoksiklav 1g';
               
               var qty = $("#qty").val();
               qty = 1;
              
              var recno = $("#recno").val();
              recno = 780;
              cashier = 'kenneth';
              var cashier = $("#cashier").val();
              //var date = $("#dte").val();
              //var btn = $(".mija").attr('name');
                
                $.ajax({
                    type:"POST",
                    url:"pharm.php",
                    //data:"rdate="+date+"&guestname="+gname+"&menuitem="+kode+"&qty="+qty+"&rate="+rate+"&recno="+recno;
                    data:"tdate="+tdate+"&code="+code+"&qty="+qty+"&recno="+recno+"&cashier="+cashier,
                     
                    success:function(data)
                    {
                       //$("#info").html(data);
                       $("#tulio").html(data);
                       $("#kode").val('');
                       $("#qty").val('');
                       
                       
                    },
                    
                    error:function(data)
                    {
                        //$("#info").html(data);
                        alert('Data no update 000');
                    }
                    
                    
                });
            }
                    
                    );
            
    });
        </script>
        
        <div id="ulla">
            <button class="mija" value="hello" id="Hennessey VSOP">Hennessey VSOP</button><button class="mija" id="Jack Daniels">Jack Daniels</button><button class="mija">Red Label</button><button class="mija">Black Label</button><br> 
            <button class="mija">Gulder</button><br>
            <button class="mija">Vodka</button>
        </div>
        <div id="tulio"></div>
        <?php
        // put your code here
        ?>
        
        <div id="info"></div>
        
        <script>
            var name = document.getElementById('Hennessey VSOP');
            name.nodeName.toLowerCase();
            alert(name.nodeName);
        </script>
        
        <script type="text/javascript">
	$("#ulla").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"660",
			    position:"left top"
			    
			    	
			}
			
			);
	</script>
    </body>
</html>
