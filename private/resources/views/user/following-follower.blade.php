<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><b>Following ({!! $user->following->count() !!})</b></div>

			<div class="panel-body">
				<article>
				@foreach($user->following as $following)
						<div class="body"><a href={!! url('/profile/'.$following->slug) !!}>{!! $following->name !!}</a></div>
				@endforeach						
				</article> 
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><b>Follower ({!! $user->follower->count() !!})</b></div>

			<div class="panel-body">
			@foreach($user->follower as $follower)
				<article>
						<div class="body"><a href={!! url('/profile/'.$follower->slug) !!}>{!! $follower->name !!}</a></div>						
				</article> 
			@endforeach
			</div>
		</div>
	</div>
</div>
