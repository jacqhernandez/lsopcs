@extends('layouts.app')
@section('content')

<h2>Create Event</h2>
<hr>

	{!! Form::open(['route' => ['events.store'], 'method' => 'post' ]) !!}
	@include('events._form')
	{!! Form::close() !!}
	
@stop