<?php

class Availability {

	public static function display($availability){
		if ($availability === 0) {
			return 'Out of Stock';
		} else if ($availability === 1) {
			return 'In Stock';
		}
	}

	public static function cssClass($availability){
		if ($availability === 0) {
			return 'outofstock';
		} else if ($availability === 1) {
			return 'instock';
		}
	}

}