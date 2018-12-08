@extends('layouts.app')

@section('content')
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('songs.Edit')}} Song #{{ $song->id }}</h3>
      <div class="box-tools">
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['songs', $song->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-sm',
                    'title' => trans('songs.Delete'). ' Song',
                    'onclick'=>'return confirm("'.trans('songs.Confirm delete?').'")'
            )) !!}
        {!! Form::close() !!}
      </div>
    </div>
    <div class="box-body">
      @if ($errors->any())
          <ul class="alert alert-danger">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      @endif
      {!! Form::model($song, [
          'method' => 'PATCH',
          'url' => ['/songs', $song->id],
          'class' => 'form-horizontal'
      ]) !!}
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                {!! Form::label('title', trans('songs.title'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('author') ? 'has-error' : ''}}">
                {!! Form::label('author', trans('songs.author'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('author', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('author', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
                {!! Form::label('year', trans('songs.year'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::number('year', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('album') ? 'has-error' : ''}}">
                {!! Form::label('album', trans('songs.album'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('album', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('album', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans("songs.Update")}}</button>
                <a href="{{ url('/songs') }}" class="btn btn-default"><i class="fa fa-reply" aria-hidden="true"></i> {{trans("songs.Cancel")}}</a>
            </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>

@endsection
