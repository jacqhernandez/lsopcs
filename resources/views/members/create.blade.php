@extends('layouts.app')
@section('content')

<h2>Create Member</h2>
<hr>

	{!! Form::open(['route' => ['members.store'], 'method' => 'post' ]) !!}
	@include('members._form')
	{!! Form::close() !!}
	
@stop