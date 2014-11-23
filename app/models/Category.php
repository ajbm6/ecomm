<?php

class Category extends Eloquent {

	protected $fillable = ['name'];

	public static $rules = ['name' => 'required|min:3'];

	public function products(){
		return $this->hasMany('Product');
	}

	public function productCount(){
		return $this->products()->count();
	}

	public function isEmpty(){
		return ($this->productCount() < 1) ? true : false;
	}
}