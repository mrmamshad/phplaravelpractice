 <?php 

// $date1 = new DateTime('now' , new DateTimeZone('Asia/Dhaka'));
// $data2 = new DateTime('2002-04-26  04:00:00');
// $difference = $date1->diff($data2);

// // echo $difference->format('%y years %m months %d days');
// // echo $date1->format('Y-m-d g:i:s a');

// $date1-> add(new DateInterval('P1Y2M5D'));
// echo $date1->format('y-m-d g:i:s a');

$date1 = new DateTime('today');
$date2 = new DateTime('tomorrow');
echo $date1->diff($date2)->format('%r%a days');