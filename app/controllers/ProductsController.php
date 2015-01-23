<?php

class ProductsController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', ['on' => 'post']);
		$this->beforeFilter('admin');
	}

	public function getIndex() {
		$categories = [];

		foreach (Category::all() as $category) {
			$categories[$category->id] = $category->name;
		}

		return	View::make('products.index')
				->with('products', Product::all())
				->with('categories', $categories);
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Product::$rules);

		if ($validator->passes()) {
			$product				= new Product;
			$product->category_id	= Input::get('category_id');
			$product->title			= Input::get('title');
			$product->description	= Input::get('description');
			$product->price			= Input::get('price');
			$product->quantity		= Input::get('quantity');

			$image		= Input::file('image');
			$filename	= date('Y-m-d-His').'-'.$image->getClientOriginalName();
			Image::make($image->getRealPath())
				->resize(468, 249)
				->save(public_path('img/products/' . $filename));

			$product->image			= 'img/products/'.$filename;

			$product->save();

			return	Redirect::to('admin/products/index')
					->with('message', 'Product Created');
		}

		return	Redirect::to('admin/products/index')
				->with('message', 'Something went wrong')
				->withErrors($validator)
				->withInput();
	}

	public function postDestroy(){
		$product = Product::find(Input::get('id'));

		$message = 'Something went wrong, please try again';

		if ($product) {
			File::delete(public_path($product->image));
			$product->delete();

			$message = 'Product Deleted';
		}

		return	Redirect::to('admin/products/index')
				->with('message', $message);
	}

	// replace with add quantity function, also change form url
	public function postToggleAvailability(){
		$product = Product::find(Input::get('id'));

		$message = 'Invalid Product';

		if ($product) {
			$product->quantity = Input::get('availability');
			$product->save();

			$message = 'Product Updated';
		}

		return	Redirect::to('admin/products/index')
				->with('message', $message);
	}
}