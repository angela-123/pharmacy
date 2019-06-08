<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>GUEST PAYMENTS</title>
        
        <style>
            li{
                font-family:  fantasy;
                font-size: 10pt;
                color:  red;
            }
            
            #mon{
                font-size: 10pt;
                font-weight: bolder;
            }
            
            
            input[type = "submit"]
            {
                width: 100px;
                height: 50px;
            }
            
            #julio{
                position:  absolute;
                right:  300px;
                top: 200px;
                width: 210px;
            }
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        
               <?php
         $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(hotels);
         
         $zew = "insert into receipts(date,status)values(CURDATE(),'resaurant')";
        if( mysql_query($zew))
        {
            echo 'Inserted';
        }
        
 else {
            echo 'Not inserted';
 }
         
        ?>
        
        <?php 
        $sew = "select MAX(rid) As Recno from receipts";
        $rew = mysql_query($sew);
        while ($row = mysql_fetch_assoc($rew)) {
            $max = $row['Recno'];
        }
        ?>
        
        <script>
            $(document).ready(function(){
            $("#save").click(function()
            {  
                
               var date = $("#dte").val();
               var guestname = $("#book").val();
               var details = $("#dets").val();
               var payment = $("#amt").val();
               var recno = $("#recno").val();
               
                            
              
              
                
                $.ajax({
                    type:"POST",
                    url:"tafa.php",
                    //data:"rdate="+date+"&guestname="+gname+"&menuitem="+kode+"&qty="+qty+"&rate="+rate+"&recno="+recno;
                    data:"date="+date+"&guestname="+guestname+"&details="+details+"&payment="+payment+"&recno="+recno,
                     
                    success:function(data)
                    {
                       $("#info").html(data);
                       $("#julio").html(data);
                       
                       
                    },
                    
                    error:function(data)
                    {
                        $("#info").html(data);
                        alert(new Date());
                    }
                    
                    
                });
            }
                    
                    );
            
    });
        </script>
        
        <div id="mon" title="RECEIPT#">
            Rec#: 
            <input type="number" value="<?php echo $max; ?>" id="recno"><br>
        </div>   
            
        
        <form id="diag">
            <label>Date</label><br>
            <input type="date" name="dte" id="dte"><br>
            <label>Guest Name</label><br>
            <input type="text" name="gst" id="book"><br>
            <label>Details</label><br>
            <input type="text" name="dets" size="25" id="dets"><br>
            <label>Amount Paid</label><br>
            <input type="number" name="amt" id="amt"><br>
            <input type="button" value="Remit" id="save">
            
            <div id="info"></div>
        </form>
        
        <div id="julio"></div>
        
    
        
        
        
        <script type="text/javascript">
$("input#book").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "croo.php",
data : data,
complete : function (xhr, result)
{
if (result !== "success") return;
var response = xhr.responseText;
var books = [];
$(response).filter ("li").each (function ()
{
books.push ($(this).text ());
});
callback (books);
}
});
}
});
</script>

      <script type="text/javascript">
	$("#diag").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"560",
			    position:"left center"
			    
			    	
			}
			
			);
	</script>
        
        
        <script type="text/javascript">
	$("#mon").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"560",
			    position:"left top"
			    
			    	
			}
			
			);
	</script>

    </body>
</html>
