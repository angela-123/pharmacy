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
           
            
            input[type = "text"]
            {
                font-size: 10pt;
                font-weight:  bold;
                color:  #005580;
            }
            
            #tulio{
                width:100px; 
            }
            
            #gagax{
                position: absolute;
                right: 200px;
                width: 100px;
                height: 70px;
                background:  #d59392;
            }
            
            input[type = "date"]{
                background: #149bdf;
                font-size: 9pt;
                font-weight:  normal;
                border: 0px;
            }
            
            #mon{
                font-size: 10pt;
                font-weight: bolder;
            }
            li{
                font-size: 10pt;
                font-weight:  bolder;
                background:  #0480be;
                
            }
            
            input[type = "button"]
            {
                width: 120px;
                height: 50px;
                background: #d59392;
                border: 0px #d59392 solid;
                
            }
            
            
            
            
            
           #dialog input[type = "text"]{
                width: 120px;
                background: #dbc59e;
                border: 0px;
                font-size: 8pt;
                font-weight: bold;
            }
            
            #dialog input[type = "number"]
            {
                font-size: 8pt;
                font-weight: bold;
            }
            
            #dialog input[type = "date"]
            {
                font-size: 8pt;
                font-weight: bold;
                width: 100px;
                background: #d59392;
            }
            
            .btn{
                position:  absolute;
                bottom: 0px;
                left: 100px;
                width: 120px;
                height: 50px;
            }
            
            
            
            #tulio{
                position:  absolute;
                right: 300px;
                top:50px;
                width: 100px;
                
            }
            
            th{
               font-size: 9pt;
               color:  #000099;
            }
            
            body{
                background: activecaption;
            }
            
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        <?php
         $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         
         $zew = "insert into receipts(tdate,cashier)values(CURDATE(),'na')";
        if( mysql_query($zew))
        {
            echo 'Inserted';
        }
        
 else {
            echo 'Not inserted';
 }
         
        ?>
        
        <?php 
        $sew = "select MAX(recno) As Recno from receipts";
        $rew = mysql_query($sew);
        while ($row = mysql_fetch_assoc($rew)) {
            $max = $row['Recno'];
        }
        ?>
        
        <?php 
        $trek = "select CURDATE() As date";
        $era = mysql_query($trek);
        $rad = mysql_fetch_assoc($era);
        $tad = $rad['date'];
        
        echo $tad;
        ?>
        
        
        <?php 
        $over = "select SUM(qtysold * unitprice) As Totalsales from dailies where ddate = CURDATE()";
        $tsales =  mysql_query($over);
        $mysales = mysql_fetch_assoc($tsales);
        ?>
        
        <div id="gaga">Total Sales:<?php echo number_format($mysales['Totalsales']);  ?></div>
 

     <script>
            $(document).ready(function(){
            $("#save").click(function()
            {  
                
               var tdate = $("#dte").val();
               //var guestname = $("#gname").val();
               var code = $("#kode").val();
               //var rate = $("#rate").val();
               
               var qty = $("#qty").val();
              
              var recno = $("#recno").val();
              var cashier = $("#cashier").val();
              
                
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
                        alert(new Date());
                    }
                    
                    
                });
            }
                    
                    );
            
    });
        </script>
        <div id="mon" title="RECEIPT#">
            Rec#: <br>
            <input type="number" value="<?php echo $max; ?>" id="recno"><br>
            Date: <br>  
            <input type="date" name="dte" id="dte" value="<?php echo $tad; ?>">
            Cashier:
            <input type="text" name="cashier" id="cashier" value="<?php echo $_SESSION['username']; ?>"><br>
            Discount(%):
            <input type="number" name="disc" id="disc">
            
            
        </div>
        
        
        <form id="dialog" title="PHARMACY MAIN">
            <table>
                
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Productcode</th>
                        <th>Qty</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="date" name="dte" id="gname" value="<?php echo $max;?>"></td>
                        <td><input type="text" name="kode" id="kode"></td>
                        <td><input type="number" name="qty" id="qty"></td>
                        
                        
                    </tr>
                    <tr>
                        <td><input type="button" value="sale" id="save"></td>
                        <td><input type="button" value="Print Receipt"></td>
                    </tr>
                </tbody>
            </table>
            
        </form>
        
        <div id="tulio"></div>
        
        
            
            
        
     

                            		                           <script type="text/javascript">
$("input#kode").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "pharmcroo.php",
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
$("input#gname").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "pharmcroo.php",
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
	$("#dialog").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"460",
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
			    width:"460",
			    position:"left top"
			    
			    	
			}
			
			);
	</script>

    </body>
</html>
