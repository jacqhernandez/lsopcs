@extends('layouts.app')
@section('content')

<h2>Edit Event</h2>
<hr>

	{!! Form::model($event, ['method' => 'PATCH', 'action' => ['EventsController@update', $event->id]]) !!}
	@include('events._form')
	{!! Form::close() !!}
	
@stop