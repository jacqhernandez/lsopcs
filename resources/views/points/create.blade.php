@extends('layouts.app')
@section('content')

<h2>Add Points</h2>
<hr>

	{!! Form::open(['route' => ['members.points.store', $id], 'method' => 'post' ]) !!}
	@include('points._form')
	{!! Form::close() !!}
	
@stop