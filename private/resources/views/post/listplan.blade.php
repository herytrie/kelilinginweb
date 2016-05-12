@extends('app')

@section('title')
<title>Home - {!! Auth::user()->name !!}</title>

@section('content')
<div class="container">


@foreach ($listplan as $list)
	<?php $user = App\User::findOrFail($list->user_id); ?>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><b><a href={!! url('/posting/'.$list->slug) !!}>{!! $list->judul !!}</a> by  -  {!! $user->name !!}{!! $list->created_at->diffForHumans() !!}</b></div>		
				<div class="panel-body">
					<article>
							<div class="body">{!! $list->tujuan !!}</div>						
					</article> 
				</div>
				<div class="panel-footer">
				</div>
			</div>
		</div>
	</div>

@endforeach

</div>
@endsection
