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
           
            input[type ="text"],input[type ="number"],input[type = "date"]
            {
                background:  #99ff99;
            }
           
            
            label{
                color:  #003366;
                font-weight: normal;
                font-family: tahoma;
            }
            
            #recno,#miki{
                
                display: none;
            }
            
            
        </style>
 <script src="libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script src="libs/jquery-ui-1.10.0.custom.min.js"></script>
        
        
    </head>
    <?php
        $zon = mysql_connect('localhost','staff','angela');
            mysql_selectdb(pharmacy);
$user = $_SESSION['username'];
$wela = "select username,password,page from users where username = '$user'";
	$tas = mysql_query($wela);
	$message = "Access Denied";
	while ($vid = mysql_fetch_assoc($tas))
	{
		$perm = $vid['page'];
	}
	
	//if($perm!='cashier') 
	if($perm!='admin')
	{   print '<div id = "jim">';
		print '<h1>' .$message.'</h1>';
		print '</div>';
		
		exit();
	}

        
        ?>
    <?php 

    ?>
    <body>
        <?php
         $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         
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
            $("#save").click(function()
            {  
                
               var tdate = $("#dte").val();
               //var guestname = $("#gname").val();
               var code = $("#kode").val();
               //var rate = $("#rate").val();
               
               var qty = $("#qty").val();
               var unitcost = $("#ucost").val();
              
              var recno = $("#recno").val();
              var cashier = $("#cashier").val();
              var supplier = $("#sup").val();
              var invoice = $("#inv").val();
              var rate = $("#rate").val();
              var expd = $("#expd").val();
              
              if(unitcost==='')
              {
                  alert('Please Enter Unicost Price');
              }
              
              
              
        
                $.ajax({
                    type:"POST",
                    url:"purchases.php",
                    //data:"rdate="+date+"&guestname="+gname+"&menuitem="+kode+"&qty="+qty+"&rate="+serate+"&recno="+recno;
                    data:"tdate="+tdate+"&code="+code+"&qty="+qty+"&unitcost="+unitcost+"&recno="+recno+"&cashier="+cashier+"&supplier="+supplier+"&invoice="+invoice+"&rate="+rate+"&expd="+expd,
                     
                    success:function(data)
                    {
                       //$("#info").html(data);
                       $("#tulio").html(data);
                       $("#kode").val('');
                       $("#qty").val('');
                       $("#expd").val('');
                       
                       
                    },
                    
                    error:function()
                    {
                        //$("#info").html(data);
                        alert('Nope');
                    }
                    
                    
                });
            }
                    
                    );
        
        
        
        $("#kode").click(function(){
            
            var pcode = $("#kode").val();
            
            
            $.ajax({
                type:"post",
                url:"newp.php",
                data:"pcode="+pcode,
                
                success:function(data)
                {
                    $("#miko").html(data);
                },
                
                error:function()
                {
                    $("#miko").html('Not Connected');
                }
            });
            
        });
        
        
        $("#Update").click(function(){
            
            var rate = $("#newrate").val();
            var pcode = $("#kode").val();
           
            if(rate === '')
            {
                alert('Please Enter New Price');
                return;
            }
            $.ajax({
                type:"post",
                url:"lasgidi.php",
                data:"rate="+rate+"&pcode="+pcode,
                
                success:function(data)
                {
                    $("#miko").html(data);
                },
                
                
                error:function()
                {
                    $("#miko").html('Not Connected');
                }
                
            });
            
        });
            
            
           
            
    });
        </script>
        
        
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        
                        
                        
                        
                        
                        <label id="miki">Rec#</label>
                        <input type="number" id="recno" class="form-control" value="<?php echo $max; ?>">
                        
                        <label>Supplier Name</label>
                        <input type="text" id="sup" class="form-control">
                        
                        <label>Invoice#</label>
                        <input type="text" id="inv" class="form-control">
                        
                        
                        <label>Staff Name</label>
                        <input type="text" id="cashier" class="form-control" value="<?php echo $_SESSION['username']; ?>">
                        
                        
                        <label>Product Code</label>
                        <input type="text" id="kode" class="form-control">
                        
                        <label>Qty</label>
                        <input type="text" id="qty" class="form-control">
                        
                        <label>Unit Cost</label>
                        <input type="number" id="ucost" class="form-control">
                        
                        <label>Expiry Date</label>
                        <input type="date" id="expd" class="form-control">
                        
                        <label>New Selling Price</label>
                        <input type="number" id="newrate" class="form-control">
                        <input type="button" id="save" class="btn btn-primary btn-lg" value="Update">
                        <input type="button" id="Update" class="btn btn-primary btn-lg" value="Update Selling Price">
                        
                        
                        
                    </div>
                    <div id="miko"></div>
                </div>
                <div id="tulio" class="col-md-4"></div>
                <div id="kodex"></div>
            </div>
            
        </div>
        
     

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
$("input#sup").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "supcroo.php",
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
			    width:"690",
			    position:"left top"
			    
			    	
			}
			
			);
	</script>
        
        <script type="text/javascript">
	$("#monu").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"460",
			    position:"left bottom"
			    
			    	
			}
			
			);
	</script>
<script type="text/javascript">
	$("#riverr").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"590",
			    position:"left top"
			    
			    	
			}
			
			);
	</script>

        
        
        
    </body>
</html>
