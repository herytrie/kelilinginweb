	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading"><b>Travel Plan ({!! $user->travelplan->count() !!})</b></div>

			<div class="panel-body">
				<article>
				@foreach($user->travelplan as $plan)
						<div class="body">
						<a href={!! url('/plan/'.$plan->slug) !!}>{!! $plan->judul !!}</a>
						<p>{!! date('d M Y', strtotime($plan->datefrom)) !!} s/d {!! date('d M Y', strtotime($plan->dateto)) !!}</p>
						<hr/>
						</div>
				@endforeach						
				</article> 
			</div>
		</div>
	</div>