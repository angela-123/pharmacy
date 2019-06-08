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
        
    </head>
    <body>
        <script>
            
            $(document).ready(function(){
                
                
                $("#bta").click(function(){
                    
                    var date = $("#dte").val();
                    var bal = $("#bal").val();
                    var did = $("#did").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"editoff.php",
                        data:"date="+date+"&bal="+bal+"&did="+did,
                        
                        success:function(data)
                        {
                            $("#angela").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#angela").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        
        <table class="table table-responsive table-bordered table-striped table-hover col-md-4">
            <tr>
                
        <?php
        $zon = mysql_connect('localhost','staff','angela');
        mysql_selectdb(pharmacy);
       // echo 'HELLO';
        $date = $_POST['date'];
        $bal = $_POST['bal'];
        $bank = $_POST['bank'];
        $cash = $_POST['cash'];
        
        $sach = "select did, ddate,opbal,cashrecs from drecs where ddate = '$date'  and opbal > 0";
        
        $news = mysql_query($sach) or die('Cant select');
        
        
         $row = mysql_fetch_assoc($news);
        
        
        ?>
                
                
               <tr><td>TransId</td>
                <td><input type="date" id="did" class="form-control" value="<?php echo $row['did']; ?>"></td>
            </tr> 
                
                
                
            <tr><td>Date</td>
                <td><input type="date" id="dte" class="form-control" value="<?php echo $row['ddate']; ?>"></td>
            </tr>
            <tr><td>Opening Balance</td>
                <td><input type="number" id="bal" class="form-control" value="<?php echo $row['opbal']; ?>"></td>
            </tr>
           
           
        
            <tr>
                <td><input type="button" id="bta" class="btn btn-default btn-lg" value="Update" style=" background:lightskyblue;"></td>
            </tr>
               
           
        </table>
         <div id="angela" class="col-md-4"></div>
        
    </body>
</html>
