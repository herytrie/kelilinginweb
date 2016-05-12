<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'secret' => '',
	],
	
	'facebook' => [
		'client_id' => '126801180763119',
		'client_secret' => 'c20d64243ab7f8b4d8d95f385eefb132',
		'redirect' => 'http://localhost/kelilingin/callback/facebook',
	],

	'google' => [
		'client_id' => '473238970455-s4thev5pveo9imtdhrgv9g86sc540m10.apps.googleusercontent.com',
		'client_secret' => 'e9t_orKHZQcVk-SFdTUNx7tK',
		'redirect' => 'http://kelilinginweb-idstartup.rhcloud.com/kelilingin/callback/google',
	],

];
