<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$don = mysql_connect('localhost','staff','angela');
mysql_select_db(pharmacy);

$uname = $_POST['username'];
$pword = $_POST['password'];
$pwordd = sha1($pword);

$_SESSION['username'] = $uname;
$xeq = "select * from users where username = '$uname' And password = '$pwordd'";
$rej = mysql_query($xeq);
$numrows = mysql_num_rows($rej);
$back = ' <a href = "jogin.php"';

if($numrows >=1)
{
    echo "Access Granted";
    header('Location:jogger.php');
    exit();
}

 else {
    echo 'Permission denied';
    
    
    //exit();
}
