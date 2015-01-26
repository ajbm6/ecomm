<?php

class Product extends Eloquent {

	protected $fillable = ['category_id', 'title', 'description', 'price', 'quantity', 'image'];

	public static $rules = [
		'category_id'	=> 'required|integer',
		'title'			=> 'required|min:2|unique:products',
		'description'	=> 'required|min:20',
		'price'			=> 'required|numeric',
		'quantity'		=> 'required|integer|min:1|max:99',
		'image'			=> 'required|image|mimes:jpeg,jpg,png'
	];

	public function category(){
		return $this->belongsTo('Category');
	}
}