<?php namespace App\Http\Controllers;

use Auth;
use DB;
use App\User;
use App\Posting;
use App\Following;
use App\Like;
use Redirect;
use Input;
use Illuminate\Http\Request;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userauth = Auth::user()->id;
		$user = User::findOrFail($userauth);
		//$konten = Posting::latest('created_at')->get();

		foreach ($user->following as $temp){
			// $following = User::findOrFail($temp->id);
			$gabung[] = $temp;
		}

		$gabung[] = $user;
		// $gabung[] = $user;
		// foreach ($gabung as $val) {
		// 		foreach ($val->posting as $temp2){
		// 			$post[] =  $temp2;
		// 			//$akun[] = User::findOrFail($temp2->user_id);
		// 			// echo $val->name, ' Posting : ', $temp2->judul;
		// 			// echo "<br/>";
		// 			//$postlike = Like::findOrFail($temp2->);
		// 		}
		// 	}

			
			//var_dump($hasil);
		

		//$gabung[] = $user;


		// $gabung = array_merge($post, $akun);
      	return view('home')->with('gabung',$gabung);
      	//return view('home')->with('post',$post);
	}


    public function setting() {
    	$userid = Auth::user()->id;
        $view = User::findOrFail($userid);
		return view('user.setting')->with('setting',$view);
    }

    public function update(User $user, Request $request) {
    	$userid = Auth::user()->id;
    	//$rule = ['name' => 'required|min:3', 'email' => 'required|email', 'phone' => 'required|min:11', 'info' => 'required|min:5'];
    	//$validasi = Validator->make($input, $rule);
        $view = User::findOrFail($userid);
        //$view->update($request->all());
        $input = array_except(Input::all(), '_method');


        if (Input::hasFile('image'))
		{
			$file = array('image' => Input::file('image'));
			if (Input::file('image')->isValid()) {
	   		$destinationPath = './assets/photo/'; // upload path
			$fileName = $view->name. '-' .time() . '.' . Input::file('image')->getClientOriginalExtension(); // renaming image
	    	Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			$input['photo'] = $fileName;
			$view->update($input); 
			//var_dump($input);
			return redirect()->back();
			}
		}else {
			$view->update($input); 
			return redirect()->back();
		}
        // $view->update = $request->input('name');
        // $view->update = $request->input('email');
        // $view->phone = $request->input('phone');
        // $view->update = $request->input('info');

        // $nama = $request->input('name');
        // $email = $request->input('email');
        // $phone = $request->input('phone');
        // $info = $request->input('info');

        // $data = ['name'=>$nama,'email'=>$email,'phone'=>$phone,'info'=>$info];
        // $view->update($data);

        //var_dump($request->all());
	}

}
