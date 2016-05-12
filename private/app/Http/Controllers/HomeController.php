<?php namespace App\Http\Controllers;

use Auth;
use DB;
use App\User;
use App\Posting;
use App\Repositories\Feed\FeedRepository;
use App\Following;
use App\TravelPlan;
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
	protected $feedRepository;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->currentUser = Auth::user();
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
		$userall = User::where('id', '!=', $userauth)->get();
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

//dd($user);
		// $gabung = array_merge($post, $akun);
      	return view('home')->with('gabung',$gabung)->with('all',$userall);
      	//return view('home')->with('post',$post);
	}

	public function popular()
	{
		$userauth = Auth::user()->id;
		$user = User::findOrFail($userauth);
		$userall = User::where('id', '!=', $userauth)->get();

				$likes = DB::table('likes')
                     ->select(DB::raw('count(post_id), post_id'))
                     ->groupBy('post_id')
                     ->orderBy('count(post_id)','desc')
                     ->get('post_id');

                     foreach($likes as $temp){
                     	$postid = $temp->post_id;
                     	$posting[] = Posting::findOrFail($postid);
                     }

                      //$like[] = $likes->post_id;

                     //var_dump($posting);
                    // echo $posting[];

      	return view('post.popular')->with('like',$posting)->with('all',$userall)->with('user',$user);
	}

	public function listplan()
	{
		$userauth = Auth::user()->id;

		$input = Input::all();
		$from = $input['fromdate'];
		$to = $input['todate'];
		$destination = $input['destination'];

		$search = TravelPlan::whereBetween('datefrom', [$from, $to])
                    ->orWhere('tujuan', $destination)->get();

       // foreach ($search as $search) {
       // 		$user = User::findOrFail($search->user_id);
       // 		$arruser[] = $user;
       // }
    
		return view('post.listplan')->with('listplan',$search);
	}

	// public function index(FeedRepository $feedRepository)
	// {
	// 	$user = $this->currentUser;

	// 	$feeds = $feedRepository->getPublishedByUserAndFriends($user);

	// 	$friendsUserIds[] = $user->id;

	// 	$feedsCount = Posting::getTotalCountFeedsForUser($friendsUserIds);

	// 	var_dump($user);
	// 	var_dump($feeds);
	// 	var_dump($feedsCount);
	// 	//return view('home')->with('user',$user)->with('feeds',$feeds)->with('feedsCount',$feedsCount);
	// }


    public function setting() {
    	$userid = Auth::user()->id;
        $view = User::findOrFail($userid);
		return view('user.setting')->with('setting',$view);
    }

    public function update(Request $request) {
    	$userid = Auth::user()->id;
    	//$rule = ['name' => 'required|min:3', 'email' => 'required|email', 'phone' => 'required|min:11', 'info' => 'required|min:5'];
    	//$validasi = Validator->make($input, $rule);
        $view = User::findOrFail($userid);
        //$view->update($request->all());
        $input = $request->all();


        if ($request->hasFile('image'))
		{
			$file = array('image' => $request->file('image'));
			if ($request->file('image')->isValid()) {
	   		$destinationPath = './assets/photo/'; // upload path
			$fileName = time(). $view->id . '.' . $request->file('image')->getClientOriginalExtension(); // renaming image
	    	$request->file('image')->move($destinationPath, $fileName); // uploading file to given path
			$input['photo'] = $fileName;
			$view->update($input); 
			//var_dump($input);
			return redirect()->back();
			}
		}else {
			$view->update($input);
			//var_dump($input); 
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
