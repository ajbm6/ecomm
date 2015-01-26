<?php

class UsersTableSeeder extends Seeder {
	public function run() {
		$user = new User;
		$user->firstname = 'Ranie';
		$user->lastname = 'Santos';
		$user->address = '#76 Bernal St. Barangay Rosario Pasig City';
		$user->city = 'Pasig';
		$user->email = 'ransan32@yahoo.com';
		$user->password = Hash::make('Admin123');
		$user->telephone = '09871234567';
		$user->admin = 1;
		$user->save();

		$user = new User;
		$user->firstname = 'Elijah';
		$user->lastname = 'Jacinto';
		$user->address = 'Paraiso St.';
		$user->city = 'Manila';
		$user->email = 'ej@yahoo.com';
		$user->password = Hash::make('password');
		$user->telephone = '09091234567';
		$user->admin = 0;
		$user->save();
	}
}