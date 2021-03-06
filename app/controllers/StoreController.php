<?php

class StoreController extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', ['on' => 'post']);
		$this->beforeFilter('auth', ['only' => ['postAddtocart', 'getCart', 'getRemoveitem']]);
	}

	public function getIndex() {
		return	View::make('store.home')
				->with('products', Product::where('quantity', '>', 0)->orderByRaw('RAND()')->take(4)->get());
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
		$keyword	= Input::get('keyword');
		$products	= Product::where('title', 'LIKE', '%'.$keyword.'%');
		$count		= $products->count();

		return	View::make('store.search')
				->with('count', $count)
				->with('products', $products->paginate(8))
				->with('keyword', $keyword);
	}

	public function postAddtocart() {
		$product	= Product::find(Input::get('id'));
		$quantity	= Input::get('quantity');

		if (!$product) {
			return	Redirect::to('/')
					->with('message', 'Invalid Product');
		} else if (!$product->isAvailable()) {
			return	Redirect::to('/store/view/'.$product->id)
					->with('message', 'This item is out of stock');
		} else if ($quantity > $product->quantity) {
			return	Redirect::to('/store/view/'.$product->id)
					->with('message', 'This item does not have enough stock to fill your order');
		}

		$product->quantity -= $quantity;
		$product->save();

		Cart::insert([
			'id'		=> $product->id,
			'name'		=> $product->title,
			'price'		=> $product->price,
			'quantity'	=> $quantity,
			'image'		=> $product->image
		]);

		return Redirect::to('store/cart');
	}

	public function getCart() {
		return	View::make('store.cart')
				->with('products', Cart::contents());
	}

	public function getRemoveitem($identifier) {
		$item = Cart::item($identifier);

		$product = Product::find($item->id);
		$product->quantity += $item->quantity;
		$product->save();

		$item->remove();
		return	Redirect::to('store/cart');
	}

	public function getContact() {
		return	View::make('store.contact');
	}

}
