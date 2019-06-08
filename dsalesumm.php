<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>DAILY SALES BY CASHIERS</title>
        <style>
            th{
                font-family:  sans-serif;
                font-size: 15pt;
                font-weight: bold;
                color:  indigo;
                background:  #d59392;
            }
            
            #diaga td{
                font-family: sans-serif;
                font-size: 15pt;
                font-weight:  bolder;
                color:  #000099;
                border:1px #999 solid;
                
            }
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>

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
        <script>
         $(document).ready(function(){

            $("#btn").click(function(){

                var date = $("#dte").val();
                var cashier = $("#cashier").val();

                $.ajax({

                    type:"post",
                    url:"dsalessummary.php",
                    data:"date="+date+"&cashier="+cashier,

                    success:function(data)
                    {
                      $("#hashy").html(data);
                    },

                    error:function()
                    {
                        $("#hashy").html('Not Connected');
                    }
                })
            })
         })
            
        </script>

        <div class = "container-fluid">
        <div class = "row">
        <div class = "col-md-3">
            <label>Date</label>>
            <input type="date"  id="dte" class = "form-control">
            <label>Cashier</label>
            <input type="text" id ="cashier" class = "form-control">
            
            <input type="button" value="Preview" id = "btn" class = "btn btn-primary btn-lg">
        
    </div>

    <div id = "hashy" class = "col-md-7">
        
    </div>
        </div>
        </div>
                                    		                           <script type="text/javascript">
$("input#cashier").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "staffcroo.php",
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


        
    
        <script>
            $(function(){
                
                $("#dte").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script>
    </body>
</html>
