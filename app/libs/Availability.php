<?php

class Availability {

	public static function display($available){
		return ($available) ? 'In Stock' : 'Out of Stock';
	}

	public static function cssClass($available){
		return ($available) ? 'instock' : 'outofstock';
	}

}