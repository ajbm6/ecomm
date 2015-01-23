<?php

class Availability {

	public static function display($quantity){
		if ($quantity === 0) {
			return 'Out of Stock';
		} else if ($quantity > 0) {
			return 'In Stock';
		}
	}

	public static function cssClass($quantity){
		if ($quantity === 0) {
			return 'outofstock';
		} else if ($quantity > 0) {
			return 'instock';
		}
	}

}