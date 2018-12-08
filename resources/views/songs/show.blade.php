@extends('layouts.app')

@section('content')
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">{{trans('songs.Songs')}} #{{ $song->id }}</h3>
      <div class="box-tools">
        <a href="{{ url('songs/' . $song->id . '/edit') }}" class="btn btn-default btn-sm" title="Edit Song"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
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
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
            <tr>
                <th>ID</th><td>{{ $song->id }}</td>
            </tr>
            <tr><th> {{ trans('songs.title') }} </th><td> {{ $song->title }} </td></tr><tr><th> {{ trans('songs.author') }} </th><td> {{ $song->author }} </td></tr><tr><th> {{ trans('songs.year') }} </th><td> {{ $song->year }} </td></tr>
        </tbody>
      </table>
    </div>
    <div class="box-footer clearfix">
      <a href="{{ url('/songs') }}" class="btn btn-default"><i class="fa fa-reply" aria-hidden="true"></i> {{trans("songs.Back")}}</a>
    </div>
  </div>
</section>

@endsection
