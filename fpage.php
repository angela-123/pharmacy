<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHARMACY MANAGEMENT SYSTEM</title>
        
        <style type="text/css">

#iroko{
position:relative;
width:30%;
height:100px;
background-color: #dd514c;
text-align:center;
border:0px solid grey;
border-radius:30px;
font-family:Arial;
font-size:28pt;
font-weight:bold;
color:darkblue;

left:0px;
opacity:075;
}

body{
background:whitesmoke;
}


#nav{
position:absolute;
width:100%;
left:17%;
}
#nav li {
	list-style-type: none;
	margin: 0;
	padding-bottom: 1px;
	float: left;
	position: relative;
	width: 150px;
	background-color:#800020;
	color:black;
	text-align:left;
	font-family:Arial;
	font-size:10pt;
	font-weight:bold;
	border-radius:5px;
	
	
}

#nav a {
	display: block;
	padding: 14px 18px;
	margin: 0;
	border-left: #ccc 1px solid;
	color: yellow;
	
	font-weight: bold;
	text-decoration: none;
	font-family: consolas;
	text-align:left;
	font-size: 9pt;
	
}

#nav ul {
	display: none;
}

#nav li:hover>ul {
	display: block;
}

a{
    text-decoration:  none;
}

#nav ul li {
	float: none;
	margin: 1px;
	padding: 1px;
	border:1px #0480be solid;
	background-color: slateblue ;
}

#nav ul {
	display: none;
	margin: 0;
	padding: 0;
	position: absolute;
	left: 0;
	top: 40px;
	width: 100px;
	background: slateblue;
}

#nav ul ul {
	left: 150px;
	top: 5px;
}

#nav li:hover>a {
	color: blue;
}

#nav ul {
	background:#ED872D;
}


#nav li:first-child a,#nav ul ul li:first-child,#nav ul a {
	border: none;
}

#splash{
position:absolute;
top:300px;
left:400px;
width:100px;
height:100px;
background:#ED872D;
border-radius:50%;
font-size: 43pt;
color:  #800020;

}

h3{
font-family:consolas;
text-align:center;
font-size:25pt;
color:brown;
}

h4{
font-family:consolas;
text-align:center;
font-size:18pt;
color:maroon;
}

ul li{
    list-style: none;
}

#sec li{
    width: 120px;
    height: 105px;
    border: #003580 1px solid;
    background: #0088cc;

}

#sec a{
    position: relative;
    top: 50px;
    left: 5px;
    color: #0000cc;
    font-weight: bold;
        
}
span{
font-size:48pt;
font-family:Arial Narrow,Verdana;
color:navy;
width:500px;
height:300px;
background:orange;
}

#screen{
position:absolute;
top:400px;
left:300px;
width:700px;
height:400px;
display:none;
background-image:-webkit-linear-gradient(270deg,cyan,yellow);
border-radius:50%;

}

#sec{
    position:  absolute;
    top:  150px;
}

body{
    background: #dd514c;
}
</style>

     <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>   
    </head>
    <body onload="xip()">
        <div id = "iroko">
DUFLUX PHARMACY

</div>
  <p id="splash">Welcome:<?php echo $_SESSION['username']; ?></p>

        <ul id="nav">
        
	
		<li><a href="#">Start</a>
			<ul>
				
                            <li><a href = "pharmitems.php"><nobr>Register Drugs</nobr></a></li>
                            <li><a href="#">Preview Drugs</a></li>
                            <li><a href="#"><nobr>Update Drugs</nobr></a></li>
								
								
								
								  
			</ul></li>
			<li><a href = "#">Transactions</a>
			<ul>
                            <li><a href="pharmdaily.php"><nobr>Point Of Sales</nobr></a></li>
                            <li><a href = "pharmpurch.php"><nobr>Purchases</nobr></a></li>
			
			
			
			
			
			</ul>
			</li>
			<li><a href = "#">Customers</a>
			<ul>
                            <li><a href="mypayments.php"><nobr>Customer Payments</nobr></a></li>
                            <li><a href = "ledger.php"><nobr>Customer Ledger</nobr></a></li>
                            
			
			
			</ul>
			</li> 
			<li><a href = "#">Reports</a>
			<ul>
			<li><a href = "#">Sales Reports</a>
			
			<ul>
			<li><a href = "dnnsales.php">Daily Sales</a></li>
			<li><a href = "#">Weekly Sales</a></li>
			<li><a href = "mmsales.php">Monthly Sales</a></li>
			<li><a href = "#">Quarterly Sales</a></li>
			<li><a href = "yrnnsales.php">Yearly Sales</a></li>
			</ul>
			
			
			</li>
                        <li><a href = "stockbal.php">Stock Report</a></li>
                        <li><a href="audit.php">Stock Audit</a></li>
                        <li><a href="expd.php">About To Expire</a></li>
			</ul>
			
			</li>
                        
			<li><a href = "#">Purchases Report</a>
			<ul>
			<li><a href = "mmpurchases.php"><nobr>Monthly Purchases</nobr></a></li>
			<li><a href = "nnyrpurchases.php">Yearly Purchases</a></li>
			</ul>
			</li>
			<li><a href = "#">Analytics</a>
			<ul>
			<li><a href = "#">Sales Chart</a>
			
			<li><a href = "#">Monthly Sales</a></li>
			<li><a href = "#">Yearly Sales</a></li>
			<li><a href = "#">Purchases</a></li>
			</ul>
			</li>
			<li></li>
			</ul>
			</li>
			
			</ul>
			
		
				
        <div id="sec">
            <ul>
                <li><a href="barsales.php">Drug Search</a></li>
                <li><a href="laundrysales.php"><nobr>Performance</nobr></a></li>
                <li><a href="restsales.php">BNF</a></li>
                <li><a href="#">Store</a></li>
            </ul>
        </div>		
		
				
			
		
	
	
	
<script type="text/javascript">
$("#splash").fadeOut(8000);
$("#screen").fadeIn('explode',{pieces:30},3000);
</script>

<script type="text/javascript">
	function xip()
	{
	$("#iroko").animate({left:"390px"},6000);
        $("#iroko").animate({down:"40px"},8000);
	
	
	}
	</script>
        <?php
        // put your code here
        ?>
    </body>
</html>
