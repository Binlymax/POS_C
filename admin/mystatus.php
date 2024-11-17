<?php 

if($st==1){
	echo '<font color="red">';
	echo 'Waiting for payment';
	echo '</font>';
}elseif ($st==2) {
	echo '<font color="green">';
	echo 'Payment made';
	echo '</font>';
}elseif ($st==3) {
	echo '<font color="blue">';
	echo 'Item has been sent';
	echo '</font>';
}elseif ($st==4) {
	echo '<font color="green">';
	echo 'Selling at the store and receiving money';
	echo '</font>';
}


?>