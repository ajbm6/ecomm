<?php

class Product extends Eloquent {

	protected $fillable = ['category_id', 'title', 'description', 'price', 'quantity', 'image'];

	public static $rules = [
		'category_id'	=> 'required|integer',
		'title'			=> 'required|min:2',
		'description'	=> 'required|min:20',
		'price'			=> 'required|numeric',
		'quantity'		=> 'integer',
		'image'			=> 'required|image|mimes:jpeg,jpg,png'
	];

	public function category(){
		return $this->belongsTo('Category');
	}
}