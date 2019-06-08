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
         <?php 
        
        session_start();
        ?>
        
        <?php
$don = mysql_connect('localhost','staff','angela');
mysql_select_db(pharmacy);

$uname = $_POST['username'];
$pword = $_POST['password'];
$pwordd = sha1($pword);
$shift = $_POST['shift'];

session_start();
$_SESSION['username'] = $uname;
$xeq = "select * from users where username = '$uname' And password = '$pwordd'";
$rods = mysql_query($xeq);

$myrod = mysql_fetch_assoc($rods);
$mybase = $myrod['location'];
$myshift = $shift;
$_SESSION['loc'] = $mybase;
$_SESSION['shift'] = $shift;

$rej = mysql_query($xeq);
$numrows = mysql_num_rows($rej);
$back = ' <a href = "jogin.php"';

if($numrows >=1)
{
    echo "Access Granted";
    header('Location:jogger.php');
    //exit();
}

 else {
    echo '<h1>'. 'Access denied' .'</h1>';
    
    
    //exit();
}

        ?>
    </body>
</html>
