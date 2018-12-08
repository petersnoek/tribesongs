@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  <h1>Songs</h1>
@stop

@section('content')

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('songs.Songs')}}</h3>
      <div class="box-tools">
        <a href="{{ url('/songs/create') }}" class="btn btn-success btn-sm" title="Add New Song"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
      </div>
    </div>

    @if(count($songs))
    <div class="box-body">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
              <th style="min-width: 120px;">
                #
                <div class="btn-group pull-right">
                  <a href="{{url('/songs?order_by=id&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                  <a href="{{url('/songs?order_by=id&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
                </div>
              </th>
              <th> {{ trans('songs.title') }}
              <div class="btn-group pull-right">
                <a href="{{url('/songs?order_by=title&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='title' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/songs?order_by=title&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='title' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th><th> {{ trans('songs.author') }}
              <div class="btn-group pull-right">
                <a href="{{url('/songs?order_by=author&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='author' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/songs?order_by=author&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='author' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th><th> {{ trans('songs.year') }}
              <div class="btn-group pull-right">
                <a href="{{url('/songs?order_by=year&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='year' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/songs?order_by=year&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='year' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th>
              <th class="text-right" style="min-width: 150px;">{{trans('songs.Actions')}}</th>
          </tr>
        </thead>
        <tbody>

        @foreach($songs as $item)
            <tr>
                <td @if($order_by == 'id') class="active" @endif>{{ $item->id }}</td>
                <td @if($order_by == 'title') class="active" @endif>{{ $item->title }}</td><td @if($order_by == 'author') class="active" @endif>{{ $item->author }}</td><td @if($order_by == 'year') class="active" @endif>{{ $item->year }}</td>
                <td class="text-right">
                  <div class="btn-group">
                    <a href="{{ url('/songs/' . $item->id) }}" class="btn btn-default btn-sm" title="{{trans('songs.View')}} Song"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> {{trans('songs.View')}}</a>
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="{{ url('/songs/' . $item->id . '/edit') }}" title="Edit Song"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{trans('songs.Edit')}}</a></li>
                      <li>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/songs', $item->id],
                            'style' => 'display:none'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Song" />', array(
                                    'type' => 'submit',
                                    'class' => '',
                            ));!!}
                        {!! Form::close() !!}
                        <a href="#" onclick="if(confirm('{{trans('songs.Confirm delete?')}}')) $(this).parent().find('form').submit(); else return false;"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="{{trans('songs.Delete')}} Song"></span> {{trans('songs.Delete')}}</a>
                      </li>
                    </ul>
                  </div>

                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    @else
      <div class="box-body">
        <div class="callout bg-gray">
          <h4>{{trans('songs.Empty')}}</h4>
          <p>{{trans('songs.This section is empty')}}</p>
        </div>
      </div>
    @endif
    <div class="box-footer clearfix">
      {!! $songs->render() !!}
    </div>
  </div>
</section>
@endsection
