<?php namespace App\Http\Controllers;

use App\User;
use App\Following;
use App\Posting;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RelasiController extends Controller {

    public function profile($id) {

        $view = User::findOrFail($id);
        return view('user.profile')->with('user',$view);
    }

    public function following($id) {

  //       $view = User::findOrFail($id);
  //        foreach ($view->following as $temp){
		// 	$following = User::where('id', '=', $temp->followingid)->first();
		// 	$following2[] = $following->name;
			
		// 	//return view('user.following')->with('following',$following);
		// 	//return view('user.following', ['following' => $following]);
		// }
		// var_dump($following2);
		// return view('user.following')->with('following', $following2);

		$view = User::findOrFail($id);
			return view('user.following')->with('following',$view);
		
    }


    public function place($id) {
        $view2 = User::findOrFail($id);
        return view('user.place')->with('follow',$view2);
    }

}
