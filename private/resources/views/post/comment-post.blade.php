<div class="panel-heading"><b>Comments ( {!! $post->comments->count() !!} )</b></div>
<div class="panel-body">
@foreach($post->comments as $comment)
	<?php $userkomen = App\User::findOrFail($comment['user_id']);?>
	<div class="col-md-12">
	<div class="form-group">
		<img class="img-circle img-nav" src={!! Cloudder::show($userkomen['photo'],['width' => 25, 'height' => 25])!!} alt="Logo">
		<a href={!! url('/profile/'.$userkomen->slug) !!}>{!! $userkomen->name !!} </a><br/>
		<p class="col-md-offset-1">{!! $comment['comment'] !!}</p>
	</div>
	</div>
@endforeach
</div>		
<div class="panel-body">
	{!! Form::open(['route'=>['post.newcom',$post->id],'role'=> 'form', 'class' => 'clearfix']) !!}
	<div class="col-md-12">
	<div class="form-group">
	{!! Form::textarea('comment',null,['class' => 'form-control', 'placeholder' => 'Max. 50 Character']) !!}
	</div>
	</div>

<div class="col-md-12">
<div class="form-group">
	{!! Form::submit('Send', ['class'=>'btn btn-primary']) !!}
</div>
</div>
{!! Form::close() !!}
</div>
</div>
