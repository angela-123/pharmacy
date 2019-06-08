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
           
            
            
            
           
            
            
            
            
            
            
            
           
           
            
            
            #tulio{
                position:  absolute;
                right: 300px;
                top:50px;
                width: 80px;
                border: 1px #dbc59e solid;
                
            }
            
            th{
               font-size: 1.3em;
               color:  #000099;
               font-weight: bolder;
            }
            
            
            #dte,#cashier,#rec,.til{
                display: none;
            }
            
            
            body{
                
            }
            
            
            #cname,#xaz{
                
                display: none;
            }
            
            
            #pname{
                font-size: 0.85em;
                font-weight: bold;
            }
            
            
            body{
                background: white
            }
           #diagau{
           font-size:12pt;
           }
           
           thh{
               
               width: 600px;
           }
           
           #st,#stk,#btnp,#cp,#cpx{
               
               display: none;
           }
            
        </style>
        <script src="libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script src="libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        <?php
         $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         
         $cash = $_SESSION['username'];
         //echo $cash;
         
         $zew = "insert into receipts(tdate,cashier)values(CURDATE(),'na')";
        if( mysql_query($zew))
        {
            //echo 'Inserted';
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
        
        //echo $tad;
        ?>
        
        
        <?php 
        $over = "select SUM(qtysold * unitprice) As Totalsales from dailies where ddate = CURDATE()";
        $tsales =  mysql_query($over);
        $mysales = mysql_fetch_assoc($tsales);
        ?>
        
     
 

     <script>
            $(document).ready(function(){
                
                
                $("#btnx").click(function(){
                
                $("#st").fadeIn(2000);
                $("#stk").fadeIn(2000);
                $("#btnp").fadeIn(2000);
                $("#sp").fadeIn(2000);
                $("#spx").fadeIn(2000);
                $("#ad").fadeOut(2000);
                $("#adj").fadeOut(2000);
                $("#qt").fadeOut(2000);
                $("#qty").fadeOut(2000);
                $("#btnx").fadeOut(2000);
                $("#save").fadeOut(2000);
                $("#btn").fadeOut(2000);
                $("#btk").fadeOut(2000);
                $("#cp").fadeIn(2000);
                $("#cpx").fadeIn(2000);
                $("#btdel").fadeOut(2000);
            });
                
                
                
                
            $("#save").click(function()
            {  
                
               var tdate = $("#dte").val();
               var cname = $("#cname").val();
               var code = $("#pname").val();
               var adj = $("#adj").val();
               
               var qty = $("#qty").val();
              
              var recno = $("#rec").val();
              var cashier = $("#cashier").val();
              var disc = $("#disc").val();
              var naira = $("#naira").val();
              var stype = $("#stype").val();
              var vat = $("#vat").val();
              
              
              
                
                $.ajax({
                    type:"POST",
                    url:"pharm.php",
                   data:"tdate="+tdate+"&code="+code+"&qty="+qty+"&recno="+recno+"&cashier="+cashier+"&disc="+disc+"&naira="+naira+"&stype="+stype+"&cname="+cname+"&vat="+vat+"&adj="+adj,
                    
                     
                    success:function(data)
                    {
                       //$("#info").html(data);
                       $("#myrec").html(data);
                       $("#pname").val('');
                       $("#qty").val('');
                       $("#disc").val(0);
                       $("#naira").val(0);
                       $("#vat").val(0);
                       $("#adj").val('0');
                       
                       
                    },
                    
                    error:function()
                    {
                        //$("#info").html(data);
                        alert(new Date());
                    }
                    
                    
                });
                
                
                $.ajax({
                    
                    type:"post",
                    url:"dtranxx.php",
                    data:"date="+tdate,
                    
                    
                    success:function(data)
                    {
                        $("#gm").html(data);
                    },
                    
                    
                    error:function()
                    {
                        $("#gm").html('');
                    }
                    
                });
            }
                    
                    
                    
                    );
            
            
            $("#pname").click(function(){
                        
                        var kode = $("#pname").val();
                        
                        $.ajax({
                            type:"post",
                            url:"daba.php",
                            data:"pname="+kode,
                            
                            success:function(fada)
                            {
                                $("#sir").html(fada);
                            },
                            
                            error:function()
                            {
                                alert('No Way');
                            }
                        });
                        
                    });
                    
                    
                    $("#btnp").click(function(){
                        
                        var code = $("#pname").val();
                        var opstock = $("#stk").val();
                        var cpx = $("#cpx").val();
                        var sp = $("#sp").val();
                        
                        
                        $.ajax({
                            
                            type:"post",
                            url:"opstocknew.php",
                            data:"pcode="+code+"&opstock="+opstock+"&cpx="+cpx+"&sp="+sp,
                            
                            success:function(data)
                            {
                                $("#myrec").html(data);
                            },
                            
                            error:function()
                            {
                                $("#myrec").html('Not Connected');
                            }
                            
                        });
                        
                    });
                    
                    
                    $("#pd").click(function(){
                        
                        var cname = $("#cname").val();
                        var od = $("#od").val();
                        var date = $("#dte").val();
                        var cashier = $("#cashier").val();
                        
                        
                        $.ajax({
                            
                            type:"post",
                            url:"cat.php",
                            data:"cname="+cname+"&od="+od+"&date="+date+"&cashier="+cashier,
                            
                            success:function(data)
                            {
                                $("#tulio").html(data);
                            },
                            
                            error:function()
                            {
                                alert('No Network');
                            }
                        });
                        
                        
                    });
                    
                    
                    $("#btk").click(function(){
                        
                        var sp = $("#sp").val();
                        var pname = $("#pname").val();
                        var recno = $("#rec").val();
                        
                        
                        $.ajax({
                            
                            type:"post",
                            url:"upprice.php",
                            data:"sp="+sp+"&pname="+pname+"&recno="+recno,
                            
                            
                            success:function(data)
                            {
                                $("#myrec").html(data);
                            },
                            
                            
                            
                            error:function()
                            {
                                $("#myrec").html('Cant Connect');
                            }
                            
                        });
                        
                    });
                    
                    
                    $("#cname").click(function(){
                        
                       
                       var cname = $("#cname").val();
                       
                       
                       $.ajax({
                           
                           type:"post",
                           url:"ctledger.php",
                           data:"cname="+cname,
                           
                           success:function(data)
                           {
                               $("#gm").html(data);
                           },
                           
                           
                           error:function()
                           {
                               $("#gm").html('Not Connected');
                           }
                           
                       });
                        
                    });

                    $("#btdel").click(function(){

                        var pname = $("#pname").val();
                        var recno = $("#rec").val();

                        $.ajax({

                            type:"post",
                            url:"pharmpro.php",
                            data:"pname="+pname+"&recno="+recno,

                            success:function(data)
                            {
                                $("#myrec").html(data);
                            },

                            error:function()
                            {
                                $("#myrec").html('Not Connected');
                            }


                        })

                    })
            
    });
        </script>
        
        
        
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group form-horizontal">
                        <label class = "til">Date</label>
                        <input type="date" id="dte" value="<?php echo $tad; ?>" class="form-control">
                        <label class="til">Receipt#</label>
                        <input type="number" id="rec" class="form-control" value="<?php echo $max; ?>">
                        
                        <label>Sales Type</label>
                        <select id="stype" class="form-control">
                            <option value="cash">cash</option>
                            <option value="credit">credit</option>
                            <option value="pos">pos</option>
                            
                        </select>
                        
                        
                        <label  class="til">Cashier</label>
                        <input type="text" id="cashier" class="form-control" value="<?php echo $cash; ?>">
                        
                        <label id="xaz">Customer Name</label>
                        <input type="text" id="cname" class="form-control" placeholder="select customer name">
                        
                        
                        
                        
                        <label>Product Code</label>
                        <input type="text" id="pname" class="form-control" placeholder="productcode or name">
                        <label id="qt">Quantity</label>
                        <input type="number" id="qty" class="form-control" value="0" placeholder="quantity">
                        
                        <label id="ad">Adjust Price</label>
                        <input type="number" id="adj" class="form-control" value="0" placeholder="quantity">
                        
                        <label id="st">Opening Stock</label>
                        <input type="number" id="stk" class="form-control" value="0" placeholder="quantity">
                        
                        <label id="spx">Selling Price</label>
                        <input type="number" id="sp" class="form-control">
                        <label id="cp">Cost Price</label>
                        <input type="number" id="cpx" class="form-control">
                        
                        <input type="button" id="save" class="btn btn-default btn-lg" value="Update" style=" background: lightseagreen; border: 0px #0074cc solid;">
                        <input type="button" id="btn" class="btn btn-default btn-lg" onclick="printDiv('myrec')" value="Print Receipt" style=" background:  #dbc59e; border: 0px #dbc59e solid;">
                        <input type="button" id="btk" class="btn btn-primary btn-lg" style=" background: orangered;" value="Adjust Price">
                        <input type="button" id="btdel" class="btn btn-primary btn-lg" style=" background: orangered;" value="Remove Item">
                        <input type="button" id="btnx" class="btn btn-primary btn-lg" style=" background: orangered;" value="New Product UI">
                        <input type="button" id="btnp" class="btn btn-primary btn-lg" style=" background: orangered;" value="Register New Product">
                        <div id="sir"></div>
                        
                    </div>
                    
                </div>
                
                <div id="myrec" class="col-md-4"></div>
                <div id="gm" class="col-md-3 col-md-offset-2"></div>
            </div>
            
        </div>
        
        <script>
            
            $("#stype").click(function(){
                
                if($("#stype").val()=== 'credit')
                {
                    
                    $("#cname").show(5000);
                    $("#xaz").show(5000);
                }
                
            });
        </script>
        
        
        
        
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
$("input#pname").autocomplete ({
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
	$("#dialoga").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"600",
                    
			    position:"left top"
			    
			    	
			}
			
			);
	</script>
        
        <script type="text/javascript">
	$("#mona").dialog(
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
