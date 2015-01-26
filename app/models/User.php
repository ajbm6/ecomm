<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	protected $fillable = ['firstname', 'lastname', 'address', 'city', 'email', 'telephone'];

	public static $rules = [
		'firstname'				=> 'required|min:2|alpha_space',
		'lastname'				=> 'required|min:2|alpha_space',
		'address'				=> 'required|min:2|',
		'city'					=> 'required|min:2|alpha_space',
		'email'					=> 'required|email|unique:users',
		'password'				=> 'required|alpha_num|between:8,12|confirmed',
		'password_confirmation'	=> 'required|alpha_num|between:8,12',
		'telephone'				=> 'required|between:7,14',
		'admin'					=> 'integer'
	];

}
