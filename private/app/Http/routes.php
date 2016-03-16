<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
// Route::get('about', 'WelcomeController@about');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
//Route::model('article','App\Article');
Route::get('about', 'LamanController@about');
Route::get('contact', 'LamanController@contact');
Route::resource('artikel', 'ArtikelController');
Route::get('user/{id}', 'RelasiController@profile');

Route::get('profile/{id}',['as' => 'profile.show','uses' => 'UserController@index']);

Route::get('follow/{id}', 'UserController@follow');
Route::get('unfollow/{id}', 'UserController@unfollow');

Route::get('like/{id}', 'PostController@like');
Route::get('unlike/{id}','PostController@unlike');

Route::get('posting/{id}','PostController@index');
Route::post('posting/{id}',['as' => 'post.newcom','uses' =>'PostController@storecomment']);

Route::get('setting',['as' => 'setting.show','uses' => 'HomeController@setting']);
Route::patch('setting',['as' => 'setting.update','uses' => 'HomeController@update']);

Route::get('following/{id}', 'RelasiController@following');
Route::get('place/{id}', 'RelasiController@place');

Route::get('social/login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');
// Route::get('relasi-1', function() {

// 	$user = App\User::where('id', '=', '9')->first();

// 	foreach ($user->posting as $temp)
// 		echo '<li>Nama : '.$temp->judul .' <strong>'.$temp->deskripsi.'</strong></li>';

// });

Route::get('relasi-2', function() {

	$user = App\User::where('id', '=', '34')->first();


	foreach ($user->following as $temp){
		$following = App\User::where('id', '=', $temp->followingid)->first();
		echo '<li>'.$user->name. ' Following : '.$following->name .' (id ',$following->id.')</li>';
		// $following2[] = $following->name;
		// $follow = $following;
		// return view('user.following')->with('following',$follow);
/*		echo '<br/>ini $following </br>'.$following.'<br/>';
		//echo $user;
		echo '<br/>ini $temp <br/>'.$temp.'</br/>';
		echo '<br/>ini $user->following <br/>'.$user->following.'<br/>';*/
	}

});

Route::get('relasi-3', function() {

	$user = App\User::where('id', '=', '32')->first();

	foreach ($user->follower as $temp){
		$following = App\User::where('id', '=', $temp->followingid)->first();
		foreach ($following->posting as $temp2)
			echo '<li>'.$following->name.' Posting : <strong>'.$temp2->judul.'</strong></li>';
	}

	$posting2 = App\User::where('id','=',$user->id)->first();
	foreach ($posting2->posting as $temp3)
		echo '<li>'.$user->name.' Posting : <strong>'.$temp3->judul.'</strong></li>';

	//var_dump($following);
});
// Route::get('artikel', 'ArtikelController@index');
// Route::get('artikel/create', 'ArtikelController@tambah');
// Route::get('artikel/{id}', 'ArtikelController@baca');
// Route::post('artikel', 'ArtikelController@simpan');
// Display all SQL executed in Eloquent
// Event::listen('illuminate.query', function($query)
// {
//     var_dump($query);
// });