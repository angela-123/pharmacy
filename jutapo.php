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
            #miki{
                
                position: absolute;
                top:100px;
                left:300px;
                
            }
            
            
            #nyolo{
                
                position:  absolute;
                right: 70px;
                top:50px;
                font-size: 15pt;
                color: darkred;
                
            }
            
            #kal{
                
                width: 120px;
                height: 50px;
            }
            
            #pcode{
                height: 25px;
            }
            
            #fin{
                position: absolute;
                top:200px;
                left:  300px;
            }
            
            input[type = "text"]
            {
                height: 40px;
                color:  darkblue;
            }
            
            #btn{
                
                width: 100px;
                height: 45px;
                border: 1px #006FCC solid;
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
         
         $xada = "select dept,productname,productcode,rate,unitcost from items";
         $nal = "select count(dept) as mydepts from items where dept = ''";
         $maya = mysql_query($nal);
         //$pol = mysql_query($xada);
         
         
        ?>
        
            <script>
                $(document).ready(function(){
                    
                    
                    $("#kal").click(function(){
                        
                        var pcode = $("#pcode").val();
                        var dept = $("#dept").val();
                        
                        $.ajax({
                            
                            type:"post",
                            url:"dag.php",
                            data:"pcode="+pcode+"&dept="+dept,
                            
                            
                            success:function(data)
                            {
                                $("#mulah").html(data);
                            },
                            
                            
                            error:function()
                            {
                                alert('No Network');
                            }
                            
                        });
                        
                    });
                    
                });
            </script>
            
            <div id="nyolo">
                <nobr>Total Number Without Departments........ <?php echo $allnill; ?></nobr>
            </div>
            
            <div id="fin">
                <form>
                    <label>Productcode</label><br>
                    <input type="text" id="pcode" placeholder="productname" size="40"><br>
                    <label>Dept</label><br>
                    <input type="text" id="dept" placeholder="enter department">
                    <input type="button" id="kal" value="Update">
                </form>
            </div>
            
            <div id="mulah"></div>
        
        
                                    		                           <script type="text/javascript">
$("input#pcode").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "stockcrop.php",
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

    </body>
</html>
