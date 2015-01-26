<?php

Validator::extend('alpha_space', function($attribute, $value) {
	return preg_match('/^[\pL\s]+$/u', $value);
});

Validator::extend('alpha_num_space', function($attribute, $value) {
	return preg_match('/^[\pL\s\w]+$/u', $value);
});