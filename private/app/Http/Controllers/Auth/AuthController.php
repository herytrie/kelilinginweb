<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;
use Validator;
use App\User;
use Auth;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}
	
	public function redirectToProvider($provider)
	{
		return Socialite::driver($provider)->redirect();
	}
	public function handleProviderCallback($provider)
	{
		$user = Socialite::driver($provider)->user();
		//dd($user); //test dump menampilkan data user facebook.
		$data = ['name'=>$user->name, 'email'=>$user->email, 'password'=>$user->token, 'photo'=>$user->avatar];
		$userDB = User::where('email',$user->email)->first();
		if(!is_null($userDB)){
			Auth::login($userDB);
		}
		else{
			Auth::login($this->create($data));
		}
		return redirect('/home');
	}

	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'photo' => 'default_uo7kn0',
			'coverimage' => 'cover_lmyrqj',
		]);
	}


}
