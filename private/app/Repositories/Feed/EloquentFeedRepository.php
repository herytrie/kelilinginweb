<?php namespace App\Repositories\Feed;

use App\User;
use App\Posting;

class EloquentFeedRepository implements FeedRepository
{

	public function getPublishedByUserAndFriends(User $user)
	{
		$friendsUserIds = $user->following()->lists('following_id');

		$friendsUserIds[] = $user->id;

		return Posting::whereIn('user_id', $friendsUserIds)->latest()->take(10)->get();

	}

	public function getPublishedByUser(User $user)
	{
		return $user->posting()->paginate(8);

	}

}