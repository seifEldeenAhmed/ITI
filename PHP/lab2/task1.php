<pre>
<?php
// First way Ps:You dont need pre tags here
//_____________________________________
// foreach ($_SERVER as $key => $value) {
//     echo "$key=>$value"."<br>";
// }
//2nd way 
//_________________________________
var_dump($_SERVER);
?></pre>
<hr>

<?php
//Task 2
//_____________________________________________________________________
$arr=[12, 45, 10, 25];
// $arr[1]=45;
// $arr[0]=12;
// $arr[3]=25;
// $arr[2]=10;
// var_dump($arr);
function sumArr($arr){
echo "Sum of Array elements=".array_sum($arr)."<br>";
rsort($arr);
echo "<ul>";
for ($i=0; $i < count($arr); $i++) { 
    echo "<li>"."$arr[$i]"."</li>";
}
echo"</ul>";
}
sumArr($arr);
//_____________________________________________________________________
?>


<?php
//Task 3
//___________________________________________________
$marksArr=array("Sara"=>31, "John"=>41, "Walaa"=>39,"Ramy"=>40);
echo "<ol>";
asort($marksArr);
//1- Ascending by Value
echo "<li>";
foreach ($marksArr as $key => $value) {
    echo "$marksArr[$key]".", ";
}
echo "</li>";
//2- Ascending by key
ksort($marksArr);
echo "<li>";
foreach ($marksArr as $key => $value) {
    echo "$marksArr[$key]".", ";
}
echo "</li>";
//3- Descending by val
arsort($marksArr);
echo "<li>";
foreach ($marksArr as $key => $value) {
    echo "$marksArr[$key]".", ";
}
echo "</li>";
//4- Descending by key
krsort($marksArr);
echo "<li>";
foreach ($marksArr as $key => $value) {
    echo "$marksArr[$key]".", ";
}
echo "</li>";
echo "</ol>";
?>
