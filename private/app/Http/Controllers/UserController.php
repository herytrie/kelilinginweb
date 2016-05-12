<?php namespace App\Http\Controllers;

use Auth;
use DB;
use App\User;
use App\Following;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function follow($id) {
		$userauth = User::findOrFail(Auth::user()->id);
        $user = User::findOrFail($id);

        $follow = new Following;
        $follow->user_id = $userauth->id;
        $follow->followingid = $user->id;
        $follow->save();       
       // DB::table('following')->insertGetId(['user_id' => $userauth->id, 'followingid' => $user->id]);
        return redirect()->back();
    }

	public function unfollow($id) {
		$userauth = User::findOrFail(Auth::user()->id);
        $user = User::findOrFail($id);
        
        DB::table('following')->where('user_id', $userauth->id)->where('followingid', $user->id)->delete();
        return redirect()->back();
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($slug)
	{
		$authid = Auth::user()->id;
		$userauth = User::findOrFail($authid);
		$id = user::whereSlug($slug)->firstOrFail()->id;
        $user = User::findOrFail($id);
        if($userauth->following->toArray() == null){
	        $followinglist[] = 0;
     	}
     	else{
     		foreach ($userauth->following as $temp2){
	        	$followinglist[] = $temp2->id;
	        }
     	}
        if ($id != $authid){
			return view('user.user-friend-profile')->with('user',$user)->with('followinglist',$followinglist);
        }
        else{
        	return view('user.user-auth-profile')->with('user',$user)->with('authid',$userauth);
        }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
