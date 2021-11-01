<?php
 $dice = mt_rand(1,6);
 if ($dice%2 == 0){
     print '偶数';
 }else{
     print '奇数';
 }