<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html ng-app = "myApp">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
        <title>TROVELA</title>
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
                
                
            }
        </style>
      <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
          <script src="js/bootstrap.min.js"></script>  
          <script src="js/jquery-1.11.3.js"></script>
        ‪<script src="js/bootstrap.min.js"></script>
         <script src = "js/angular.min.js"></script>
          <script src = "js/angular-route.min.js"></script>
        ‪
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
                    
                    <a class="navbar-brand brand" href="#" style=" background: lightblue; font-size: 2em;">TROVELA</a>
                    
                </div>
                
                <div class="collapse navbar-collapse navbar-center" id="mynavbar-content" style=" background: orangered; color:  #8c8c8c;">
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin<b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: #a6e1ec;">
                                
                                <li><a href="#!hms">Create Users</a></li>
                                
                                <li><a href="#!updates">Update Stock</a></li>
                                <li><a href="#!regnewitems">Register New Products</a></li>
                                
                                
                                <li><a href="#!pcheck">Price Check</a></li>
                                <li><a href="#!updateprice">Change Price</a></li>
                                
                                
                                <li><a href="#!suppliers">Suppliers</a></li>
                                <li><a href="#!customers">Customers</a></li>
                                
                                
                                
                                
                                
                                
                                
                            </ul>
                        </li>
                        
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Transactions<b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: #a6e1ec;">
                                
                                <li><a href="#!pharmdaily">Point Of Sales</a></li>
                                <li><a href="#!purchases">Purchases</a></li>
                                <li><a href="#!expenses">Expenses</a></li>
                                
                                
                                
                                
                                
                                
                            </ul>
                        </li>
                        
                        
                       
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="">Sales Reports <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: white;">
                                <li><a href="#!dsales">Cashier Sales</a></li>
                                <li><a href="#!cash">Cashiers Summary</a></li>
                                <li><a href="#!dsalesumm">Daily Summary</a></li>
                                
                                 
                                <li><a href="#!drevs">Profit Reporting</a></li>
                                
                                <li><a href="#!dsalesall">Daily Sales Analysis</a></li>
                                <li><a href="#!yrs">Yearly Summary</a></li>
                                <li><a href="#!mtsales">Cashier Monthly Sales</a></li>
                                <li><a href="#!mtsaless">Monthly Total Sales</a></li>
                                <li><a href="#!cashperf">Cashier Monthly Performance</a></li>
                            </ul>
                            
                        </li>
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Purchases Report <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: lightskyblue;">
                                <li><a href="#!mpurch">Monthly Purchases Amount</a></li>
                                <li><a href="#!dhist">Purchases History</a></li>
                                <li><a href="#!dashboard">Products Dashboard</a></li>
                                
                            </ul>
                            
                        </li>
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Payments<b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background:  #e78f08;">
                                <li><a href="#!supas">Suppliers</a></li>
                                <li><a href="custpayments.php">Customers</a></li>
                               
                                
                                
                                
                                
                                
                                
                            </ul>
                            
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Stock Reports <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background:  #f8efc0;">
                                <li><a href="#!stock">Stock Sheet</a></li>
                                <li><a href="#!audit">Stock Audit</a></li>
                                
                    
                                
                               
                                <li><a href="#!worth">Stock Worth</a></li>
                               
                                
                            </ul>
                            
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">General Reports <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background:  #f8efc0;">
                                
                                <li><a href="#!count">Stock Taking</a></li>
                                
                               
                                
                            </ul>
                            
                        </li>
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Edits <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background:  #f8efc0;">
                                <li><a href="#!edits">Edit Opening Balances</a></li>
                                
                                <li><a href="#!editprods">Edit Products</a></li>
                                
                                
                            </ul>
                            
                        </li>
                        
                        
                        
                        
                        
                        
                    </ul>
                    
                </div>
                
            </div>
        </div>

        <div ng-view></div>
        
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

<script>
                    var angela = angular.module('myApp',['ngRoute']);
                    angela.config(function($routeProvider){
                        $routeProvider.when("/",{

                            templateUrl:'trumains.html'

                        }).when("/hms",{

                            templateUrl:'users.php'
                        }).when('/updates',{

                            templateUrl:'updates.php'
                        }).when('/regnewitems',{

                            templateUrl:'regnewitems.php'
                        }).when('/users',{
                            templateUrl:'users.php'
                        }).when('/regitems',{

                            templateUrl:'regitems.php'
                        }).when('/pcheck',{
                            templateUrl:'pricecheck.php'
                        }).when('/updateprice',{
                            templateUrl:'updateprice.php'
                        }).when('/suppliers',{
                            templateUrl:'suppliers.php'
                        }).when('/customers',{
                            templateUrl:'customers.php'
                        }).when('/pharmdaily',{
                            templateUrl:'pharmdaily.php'
                        }).when('/purchases',{
                            templateUrl:'pharmpurch.php'
                        }).when('/expenses',{
                            templateUrl:'expenses.php'
                        }).when('/btrans',{
                            templateUrl:'banktrans.php'
                        }).when('/returns',{
                            templateUrl:'preturns.php'
                        }).when('/pchreturns',{
                            templateUrl:''
                        }).when('/dsales',{
                            templateUrl:'dsales.php'
                        }).when('/cash',{
                            templateUrl:'cashsumm.php'
                        }).when('/dsalesumm',{
                            templateUrl:'dsalesumm.php'
                        }).when('/drevs',{
                            templateUrl:'drevs.php'
                        }).when('/dsalesall',{

                            templateUrl:'dsalesall.php'
                        }).when('/yrs',{

                            templateUrl:'yrrsales.php'
                        }).when('/mtsales',{
                            templateUrl:'mtsales.php'
                        }).when('/mtsaless',{
                            templateUrl:'mtsalescash.php'
                        }).when('/cashperf',{
                            templateUrl:'cashierperf.php'
                        }).when('/mpurch',{
                            templateUrl:'mpurchases.php'
                        }).when('/dhist',{
                            templateUrl:'dhist.php'
                        }

                        ).when('/dashboard',{
                            templateUrl:'dashboard.php'
                        }).when('/stock',{

                            templateUrl:'stock.php'
                        }).when('/audit',{

                            templateUrl:'audit.php'
                        }).when('/worth',{
                            templateUrl:'stockwrth.php'
                        }).when('/count',{
                            templateUrl:'stockcount.php'
                        }).when('/supas',{
                            templateUrl:'supayments.php'
                        }).when('/edits',{
                            templateUrl:'edits.php'
                        }).when('/editprods',{
                            templateUrl:'editprods.php'
                        })


                    });

                    </script>
               

    </body>
</html>
