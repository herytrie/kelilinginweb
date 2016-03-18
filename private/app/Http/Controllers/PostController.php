<?php namespace App\Http\Controllers;

use Auth;
use DB;
use Input;
use App\User;
use App\Posting;
use App\Comments;
use App\Like;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PostController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function like($id) {
		$userauth = User::findOrFail(Auth::user()->id);
        $post = Posting::findOrFail($id);

        $like = new Like;
        $like->post_id = $post->id;
        $like->user_id = $userauth->id;
        $like->save();
       	//DB::table('likes')->insertGetId(['post_id' => $post->id, 'user_id' => $userauth->id]);
        return redirect()->back();
    }

    public function unlike($id) {
		$userauth = User::findOrFail(Auth::user()->id);
        $post = Posting::findOrFail($id);
        
        DB::table('likes')->where('post_id', $post->id)->where('user_id', $userauth->id)->delete();
        return redirect()->back();
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$post = Posting::findOrFail($id);
		$user = User::findOrFail($post->user_id);
		$userauth = User::findOrFail(Auth::user()->id);

		//cek sudah follow belum ?
		if($userauth->following->toArray() == null){
	        $followingname[] = 0;
     	}
     	else{
			foreach ($userauth->following as $temp2){
	        	$followingname[] = $temp2->id;
	        }
		}
		if ($user->id == $userauth->id)
			return view('post.detail')->with('post',$post)->with('user',$user);
		if (in_array($user->id, $followingname)){
			return view('post.detail')->with('post',$post)->with('user',$user);
		}
		else{
			echo "Please <a href=../follow/".$user->id.">Follow ".$user->name."</a> to see this post.";
		}
		//end cek
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function createplan()
	{
    	$userid = Auth::user()->id;
        $view = User::findOrFail($userid);
		return view('post.travelplan')->with('plan',$view);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storecomment($id)
	{
		$input = Input::all();
        $input['post_id'] = $id;
        $input['user_id'] = Auth::user()->id;
        Comments::create($input);
        //$input->save();
		return redirect()->back();
		// $posts = Posting::findOrFail($id);
		// dd($posts);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

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
