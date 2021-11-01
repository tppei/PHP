<?php 
$r =0;
$total =0;
  for($i =1; $i <= 100; $i++) {
     if($i %3 === 0){
         $r = $i;
         $total += $r;
     }
     
 }print $total;