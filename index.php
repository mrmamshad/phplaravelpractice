<?php 
$date  =  strtotime('today');
// echo date('y-m-d H:i:s', $date);

$dateaftertendays  =  strtotime('today  + 10 day 10hours ' , $date);
// echo date('y-m-d H:i:s', $dateaftertendays);

$week = date('W');
// echo $week;

$year = date('Y');
 echo $year;


$tommorow = strtotime('26nd april 2024');
echo date('y-m-d H:i:s', $tommorow );
