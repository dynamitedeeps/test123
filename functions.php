<?php

//$date - Y-m-d format
function getShippingDate($orderDate, $oderTime) {
	global $holidays,$cutOffTime;
	$day = date('l',strtotime($orderDate));
	if (!in_array($day, $holidays) && date('H', strtotime($oderTime)) <= $cutOffTime) {
		return date('Y-m-d', strtotime($orderDate));
	}
	elseif($day == 'Thursday' && date('H', strtotime($oderTime)) > $cutOffTime){
		return date('Y-m-d', strtotime('next friday', strtotime($orderDate)));
	}
	return date('Y-m-d', strtotime('next thursday', strtotime($orderDate)));
}

?>