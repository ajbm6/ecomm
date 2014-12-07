<?php

class UsersTableSeeder extends Seeder {
	public function run() {
		$user = new User;
		$user->firstname = 'Ranie';
		$user->lastname = 'Santos';
		$user->email = 'ransan32@yahoo.com';
		$user->password = Hash::make('Admin123');
		$user->telephone = '09871234567';
		$user->admin = 1;
		$user->save();
	}
}