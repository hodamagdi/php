<?php
// tast 1 (\n to work)
echo nl2br("Hoda \n Magdy \n Mahmoud ");

// task2 (display $_SERVER in readable formate)
echo"<pre>";
print_r($_SERVER);
echo "</pre>";

// task3 (write script to get sum and avg)
$numbers=array(12,45,10,25);
$sum=array_sum($numbers);
$count=count($numbers);
$avg=$sum / $count ;
rsort($numbers); 
echo "Array: " . implode(', ', $numbers) . "<br>";
echo "Sum: $sum <br>";
echo "Average: $avg <br>";

// task4 (sort the array)
$ages=array("sara"=>31, "john"=>41 , "walaa"=>39, "Ramy"=>40);
// 1)ascending order sort by value 
asort($ages);
echo "Ascending order sort by value:";
print_r ($ages);
echo "<br>";
// 2)ascending order sort by key
ksort($ages);
echo "Ascending order sort by key:";
print_r ($ages);
echo "<br>";


// 3)descending order sort by value 
arsort($ages);
echo "descending order sort by value:";
print_r ($ages);
echo "<br>";

// 4)descending order sort by key
krsort($ages);
echo "descending order sort by key:";
print_r ($ages);
echo "<br>";
?>
