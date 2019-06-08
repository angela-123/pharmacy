<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

      $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(hotels);
         $date = $_POST['date'];
         $name = $_POST['guestname'];
         $dets = $_POST['details'];
         $amt = $_POST['payment'];
         $recc = $_POST['recno'];
         $sede = "insert into gl(date,guestname,details,payment,recno)values('$date','$name','$dets','$amt','$recc')";
         $milk = "select SUM(amount) As Debit,SUM(payment) As Credit from gl where guestname = '$name' GROUP BY guestname";
         $rtu = mysql_query($milk);
         $zow = mysql_fetch_assoc($rtu);
         $amount = $zow['Debit'];
         $payment = $zow['Credit'];
         $debt = $amount - $payment;
         $totdebt = $debt - $amt;
        if (mysql_query($sede))
        {
            echo 'Customer Account is credited with....'.number_format($amt).'<br>';
            echo 'Customer balance is now ..'.  number_format($totdebt,2);
        }
        
 else {
            echo 'Record Not updated';
 }
 
 $tad = "select gid, date,guestname,details,payment,recno from gl where guestname = '$name' And date = '$date' And recno = '$recc'";
 $rose = mysql_query($tad);
 
 
 echo '<table id = diag title = "BILL">';
       echo '<thead>';
       echo '<tr>';
       echo '<td>';
       echo 'Salems Guest Inn';
       echo '</td>';
       echo '</tr>';
       
       echo '<tr>';
       echo '<td>';
       echo 'Komoe Street Maitama';
       echo '</td>';
       echo '</tr>';
       echo '</thead>';
       
       while ($row1 = mysql_fetch_assoc($rose))
    
    
    {    //$src = $file_path.$row1['passport'];
    	echo '<th>';
        
    	 echo '<tr>';
        echo '<td>Receipt#</td>';
    	echo '<td>';
    	echo $row1['recno'];
    	echo '</td>';
    	echo '</tr>';
        
        echo '<tr>';
    	echo '<td>Guestname</td>';
    	echo '<td>';
    	echo $row1['guestname'] .'<br>';
    	echo '</td>';
    	echo '</tr>';
        
    	echo '<tr>';
         echo '<td>Details</td>' .'<br>';
         echo '<td>';
    	echo 'Part Payment'.'<br>';
    	echo '</td>';
    	echo '</tr>';
    	echo '<tr>';
    	echo '<td>Amount</td>';
    	echo '<td>';
    	echo number_format($amt) .'<br>';
    	echo '</td>';
    	echo '</td>';
    	
    }
       echo '</table>';