<?php

class StoreController extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', ['on' => 'post']);
		$this->beforeFilter('auth', ['only' => ['postAddtocart', 'getCart', 'getRemoveitem']]);
	}

	public function getIndex() {
		return	View::make('store.index')
				->with('products', Product::take(4)->orderBy('created_at', 'DESC')->get());
	}

	public function getView($id) {
		$product = Product::find($id);

		if ($product) {
			return View::make('store.view')->with('product', $product);
		}

		return	Redirect::to('/')->with('message', 'Invalid Product');
	}

	public function getCategory($cat_id) {
		$category = Category::find($cat_id);

		if ($category && !$category->isEmpty()) {
			return	View::make('store.category')
					->with('products', $category->products()->paginate(6))
					->with('category', $category);
		}

		return	Redirect::to('/')->with('message', 'Invalid Category');

	}

	public function getSearch(){
		$keyword = Input::get('keyword');

		return	View::make('store.search')
				->with('products', Product::where('title', 'LIKE', '%'.$keyword.'%')->get())
				->with('keyword', $keyword);
	}

}
