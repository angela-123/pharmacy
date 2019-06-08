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
    </head>
    <body>
        
        <?php
         $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pharmacy);
         
         $xada = "select productcode,productname,rate,unitcost,dept from items";
         $nal = "select count(dept) as mydepts from items where dept = ''";
         $maya = mysql_query($nal);
         $pol = mysql_query($xada);
         
         
        ?>
        <table id="miki">
            
        <?php
            
        while ($rad = mysql_fetch_assoc($pol))
                
        {
            
        
        
        ?>
            
            <tr>
            <input type="text" class="items" value="<?php echo $rad['productcode']; ?>" size="30"><input type="text" class="items" value="<?php echo $rad['productname'];?>" size="30"><input type="text" class="items" value="<?php echo $rad['dept']; ?>"><input type="button" id="btn" value="Update"><br>
            </tr>
            
            <?php 
            
            
                
            }
            ?>
            
            <?php 
            
            $nope = mysql_fetch_assoc($maya);
            
            $allnill = $nope['mydepts'];
            //echo $allnill;
            ?>
            
            <div id="nyolo">
                <nobr>Total Number Without Departments........ <?php echo $allnill; ?></nobr>
            </div>
        </table>
    </body>
</html>
