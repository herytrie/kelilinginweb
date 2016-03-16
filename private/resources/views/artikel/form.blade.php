<div class="form-group">
{!! Form::label('judul','Judul :') !!}
{!! Form::text('judul',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('isi','Isi :') !!}
{!! Form::textarea('isi',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('published_at','Di publikasi pada :') !!}
{!! Form::text('published_at',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::submit($namaTombol,['class' => 'btn btn-primary form-control']) !!}
</div>