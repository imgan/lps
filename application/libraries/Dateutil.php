<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dateutil {
    
	public function getMonthName($month){
		if($month == 1){
			$monthName = "January";
		} else if ($month == 2){
			$monthName = "February";
		} else if ($month == 3){
			$monthName = "March";
		} else if ($month == 4){
			$monthName = "April";
		} else if ($month == 5){
			$monthName = "May";
		} else if ($month == 6){
			$monthName = "June";
		} else if ($month == 7){
			$monthName = "July";
		} else if ($month == 8){
			$monthName = "August";
		} else if ($month == 9){
			$monthName = "September";
		} else if ($month == 10){
			$monthName = "October";
		} else if ($month == 11){
			$monthName = "November";
		} else if ($month == 12){
			$monthName = "December";
		} else {
			$monthName = "Undefined";
		}

		return $monthName;
	}

	public function getMonthNameIndo($month){
		if($month == 1){
			$monthName = "Januari";
		} else if ($month == 2){
			$monthName = "Februari";
		} else if ($month == 3){
			$monthName = "Maret";
		} else if ($month == 4){
			$monthName = "April";
		} else if ($month == 5){
			$monthName = "Mei";
		} else if ($month == 6){
			$monthName = "Juni";
		} else if ($month == 7){
			$monthName = "Juli";
		} else if ($month == 8){
			$monthName = "Agustus";
		} else if ($month == 9){
			$monthName = "September";
		} else if ($month == 10){
			$monthName = "Oktober";
		} else if ($month == 11){
			$monthName = "November";
		} else if ($month == 12){
			$monthName = "Desember";
		} else {
			$monthName = "Undefined";
		}

		return $monthName;
	}
}
