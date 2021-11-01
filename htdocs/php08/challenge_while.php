<?php
  $i = 0;
  $sum = 0;
  while($sum <= 1000 ){
      $i++;
      $sum += $i;
  }
  print "<p>" .$i."</p>";
  print $sum;