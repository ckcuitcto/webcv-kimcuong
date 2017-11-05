<?php 

function f1($a ,$b){
	$a+=3; 
	$b-=3;
	$x1 =1;
	$x2 = 3;
	f1($x1,$x2); 
	echo "$x1 - $x2 "; 
}

?>