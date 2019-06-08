<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
        <title>DRUGMART</title>
        <style> 
            #mynavy{
                background: #a6e1ec;
            }
            
           #mynavy a{
                color: #122b40;
                font-size: 1.2em;
                font-family: tahoma;
            }
            
           .dropdown ul,dropdown-toggle ul{
                color: darkred;
                background: #8c8c8c;
            }
            
            #eva{
                position: absolute;
                bottom:5%;
                left:5%;
            }
            
            #max{
                
                display: block;
            }
            
            h1{
                
                color:yellow;
                font-style:  italic;
            }
            
            body{
                
                opacity: 0.75;
            }
        </style>
       <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
          <script src="js/bootstrap.min.js"></script>  
          <script src="js/jquery-1.11.3.js"></script>
        ‪<script src="js/bootstrap.min.js"></script>
‪
               
 
    </head>
    <body onload="adx();">
        
        <?php session_start(); ?>
        
        <div class="navbar navbar-default" id="mynavy">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle = "collapse" data-target="#mynavbar-content">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        
                    </button>
                    
                    <a class="navbar-brand brand" href="#" style=" background: lightblue; font-size: 2em;">DUFLUX</a>
                    
                </div>
                
                <div class="collapse navbar-collapse navbar-center" id="mynavbar-content" style=" background: orangered; color:  #8c8c8c;">
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin<b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: #a6e1ec;">
                                
                                <li><a href="hmsuseradmin.html">Create Users</a></li>
                                
                                <li><a href="updates.php">Update Stock</a></li>
                                <li><a href="regnewitems.php">Register New Products</a></li>
                                <li><a href="regitems.php">Register Products</a></li>
                                
                                <li><a href="pricecheck.php">Price Check</a></li>
                                <li><a href="updateprice.php">Change Price</a></li>
                                
                                
                                <li><a href="suppliers.php">Suppliers</a></li>
                                <li><a href="customers.php">Customers</a></li>
                                
                                
                                
                                
                                
                                
                                
                            </ul>
                        </li>
                        
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Transactions<b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: #a6e1ec;">
                                
                                <li><a href="pharmdaily.php">Point Of Sales</a></li>
                                <li><a href="pharmpurch.php">Purchases</a></li>
                                <li><a href="expenses.php">Expenses</a></li>
                                <li><a href="banktrans.php">Bank Lodgments</a></li>
                                <li><a href="returns.php">Sales Returns</a></li>
                                <li><a href="preturns.php">Purchases Returns</a></li>
                                
                                
                                
                                
                                
                            </ul>
                        </li>
                        
                        
                       
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="">Sales Reports <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: white;">
                                <li><a href="dsales.php">Cashier Sales</a></li>
                                <li><a href="cashsumm.php">Cashiers Summary</a></li>
                                <li><a href="dsalesumm.php">Daily Summary</a></li>
                                <li><a href="dcredits.php">Daily Credit</a></li>
                                 
                                <li><a href="drevs.php">Daily Profit</a></li>
                                <li><a href="mrevs.php">Monthly Profit</a></li>
                                <li><a href="quaters.php">Quarterly Profit Profit</a></li>
                                <li><a href="yrevs.php">Yearly Profit</a></li>
                                <li><a href="dsalesall.php">Total Sales</a></li>
                                <li><a href="yrrsales.php">Yearly Summary</a></li>
                                <li><a href="mtsales.php">Cashier Monthly Sales</a></li>
                                <li><a href="mtsalescash.php">Monthly Total Sales</a></li>
                                <li><a href="cashierperf.php">Cashier Monthly Performance</a></li>
                            </ul>
                            
                        </li>
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Purchases Report <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: lightskyblue;">
                                <li><a href="mpurchases.php">Monthly Purchases Amount</a></li>
                                <li><a href="dhist.php">Purchases History</a></li>
                                <li><a href="dashboard.php">Products Dashboard</a></li>
                                
                            </ul>
                            
                        </li>
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Payments<b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background:  #e78f08;">
                                <li><a href="supayments.php">Suppliers</a></li>
                                <li><a href="custpayments.php">Customers</a></li>
                               
                                
                                
                                
                                
                                
                                
                            </ul>
                            
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Stock Reports <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background:  #f8efc0;">
                                <li><a href="stock.php">Stock Sheet</a></li>
                                <li><a href="audit.php">Stock Audit</a></li>
                                <li><a href="allstock.php">Stock History</a></li>
                                <li><a href="expired.php">About To Expire</a></li>
                                
                               
                                <li><a href="stockwrth.php">Stock Worth</a></li>
                               
                                
                            </ul>
                            
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">General Reports <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background:  #f8efc0;">
                                <li><a href="dhist.php">Purchases History</a></li>
                                <li><a href="stockcount.php">Stock Taking</a></li>
                                <li><a href="dtrans.php">Daily Transactions</a></li>
                                <li><a href="mdtrans.php">Monthly Transactions</a></li>
                               
                                
                            </ul>
                            
                        </li>
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Edits <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background:  #f8efc0;">
                                <li><a href="edits.php">Edit Opening Balances</a></li>
                                <li><a href="editbanks.php">Edit Bank Lodgements</a></li>
                                <li><a href="editprods.php">Edit Products</a></li>
                                <li><a href="editpexpenses.php">Edit Expenses</a></li>
                                
                            </ul>
                            
                        </li>
                        
                        
                        
                        
                        
                        
                    </ul>
                    
                </div>
                
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6" id="max">
                   
                    
                    <div class="row">
                        
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
        
        <?php
        // put your code here
        ?>
<script>
    $(document).ready(function(){
        
        $("#help").click(function(){
            
           
           $.ajax({
               
               url:"help.php",
               
               success:function(data)
               {
                   $("#yaya").html(data);
               },
               
               error:function()
               {
                   alert('No Network');
               }
               
           });
            
        });
        
    });
</script>
<div id="yaya"></div>




        
        <div id="eva" style="background:  #1c94c4;color: #e7e7e7;font-size: 2.5em" class="col-sm-6 col-md-6 col-lg-10">
            
            <h2 style="color: darkblue;"><nobr>Welcome:<?php echo $_SESSION['username']; ?></nobr></h2>
            
        </div>
        
        <script>
            function adx()
            {
                $("#eva").fadeOut(5000);
            }
        </script>
    </body>
</html>
