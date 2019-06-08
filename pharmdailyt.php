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
                font-size: 13pt;
                font-weight:  bolder;
                color:  #005580;
            }
            
            #tulio{
                width:80px; 
                
                
                
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
                font-size: 12pt;
                font-weight:  normal;
                border: 0px;
            }
            
            #mon{
                font-size: 10pt;
                font-weight: bolder;
            }
            li{
                font-size: 16pt;
                font-weight:  bolder;
                background: #eee;
                
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
                background: mintcream;
                border: 0px;
                height: 20px;
                font-size: 8pt;
                font-weight: bold;
            }
            
            #dialog input[type = "number"]
            {
                font-size: 8pt;
                font-weight: bold;
                height: 20px;
            }
            
            #dialog input[type = "date"]
            {
                font-size: 12pt;
                font-weight: bold;
                width: 100px;
                background: aliceblue;
                height: 20px;
            }
            
            #tulio{
                position:  absolute;
                right: 300px;
                top:50px;
                width: 80px;
                border: 1px #dbc59e solid;
                
            }
            
            th{
               font-size: 12pt;
               color:  #000099;
            }
            
            td{
              font-size:12pt;
              font-weight:bold;
              height: 40px;
              }
            
            body{
                background: activecaption;
            }
            
            #dayo{
                position: absolute;
                left:10px;
                top:200px;
                border: 0px #d59392 solid;
                
                height: 100px;
                font-size: 17pt;
                font-weight:  bold;
                color: darkred;
            }
            
            #dialog{
                background:  #2f96b4;
            }
            
            #mon{
                background: #006FCC;
            }
            
            body{
                background: #eee;
            }
           #diagau{
           font-size:12pt;
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
               var cname = $("#cname").val();
               var code = $("#kode").val();
               //var rate = $("#rate").val();
               
               var qty = $("#qty").val();
              
              var recno = $("#recno").val();
              var cashier = $("#cashier").val();
              var disc = $("#disc").val();
              var naira = $("#naira").val();
              var stype = $("#stype").val();
              
                
                $.ajax({
                    type:"POST",
                    url:"pharm.php",
                   data:"tdate="+tdate+"&code="+code+"&qty="+qty+"&recno="+recno+"&cashier="+cashier+"&disc="+disc+"&naira="+naira+"&stype="+stype+"&cname="+cname,
                    
                     
                    success:function(data)
                    {
                       //$("#info").html(data);
                       $("#tulio").html(data);
                       $("#kode").val('');
                       $("#qty").val('');
                       $("#disc").val(0);
                       $("#naira").val(0);
                       
                       
                    },
                    
                    error:function(data)
                    {
                        //$("#info").html(data);
                        alert(new Date());
                    }
                    
                    
                });
            }
                    
                    
                    
                    );
            
            
            $("#kode").click(function(){
                        
                        var kode = $("#kode").val();
                        
                        $.ajax({
                            type:"post",
                            url:"daba.php",
                            data:"kode="+kode,
                            
                            success:function(fada)
                            {
                                $("#dayo").html(fada);
                            },
                            
                            error:function()
                            {
                                alert('No Way');
                            }
                        });
                        
                    });
                    
                    
                    $("#kode").click(function(){
                        
                        var code = $("#kode").val();
                        
                        
                        $.ajax({
                            
                            type:"post",
                            url:"zada.php",
                            data:"code="+code,
                            
                            success:function(data)
                            {
                                $("#zulio").html(data);
                            },
                            
                            error:function()
                            {
                                alert("Bros No Show");
                            }
                            
                        });
                        
                    });
            
    });
        </script>
        <div id="mon" title="RECEIPT#">
            Rec#: <br>
            <input type="number" value="<?php echo $max; ?>" id="recno"><br>
            Date: <br>  
            <input type="date" name="dte" id="dte" value="<?php echo $tad; ?>"><br>
            Cashier:<br>
            <input type="text" name="cashier" id="cashier" value="<?php echo $_SESSION['username']; ?>"><br>
            Customer Name:<br>
            <input type="text" id="cname" value="na"><br>
            
            Sales Type:<br>
            <input type="text" id="stype" value="cash"><br>
            Discount in Naira:<br>
            <input type="number" id="naira" value="0">
            
            
        </div>
        
        
        <form id="dialog" title="PHARMACY MAIN">
            <table>
                
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Productcode</th>
                        <th>Qty</th>
                        <th>%Discount</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="date" name="dte" id="gname" value="<?php echo $tad;?>"></td>
                        <td><input type="text" name="kode" id="kode" size="40"></td>
                        <td><input type="number" name="qty" id="qty"></td>
                        <td><input type="number" name="disc" id="disc" value="0"></td>
                        
                        
                    </tr>
                    <tr>
                        <td><input type="button" value="sale" id="save"></td>
                        <td><input type="button" value="Print Receipt" onclick="printDiv('tulio')"></td>
                    </tr>
                </tbody>
            </table>
            <div id="zulio"></div>
        </form>
        
        <table id="tulio"></table>
        
        <div id="dayo"></div>
       
        
        
        
             <script type="text/javascript">
    function printDiv(divID)
    {   //var dte = document.getElementById('hy');
     //dte = new Date();
        var divElements = document.getElementById(divID).innerHTML;

        var oldpage = document.body.innerHTML;

        document.body.innerHTML = "<html><head><title></title></head><body><table title = INTENT ENERGY SOLUTIONS>" +divElements + "</table></body>";
        
        window.print();
        
        
        

        document.body.innerHTML = oldpage; 
        //document.forms["dag"].refresh();
        window.location.reload();
        
    }
    </script>
     

                            		                           <script type="text/javascript">
$("input#kode").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "stockcroo.php",
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
$("input#cname").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "custcroo.php",
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
			    width:"800",
                    
			    position:"left top"
			    
			    	
			}
			
			);
	</script>
        
        <script type="text/javascript">
	$("#mon").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"600",
			    position:"left bottom"
			    
			    	
			}
			
			);
	</script>

    </body>
</html>
