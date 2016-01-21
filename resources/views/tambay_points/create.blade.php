@extends('layouts.app')
@section('content')

<h2>Add Tambay Points</h2>
<hr>

	{!! Form::open(['route' => ['members.tambay_points.store', $id], 'method' => 'post' ]) !!}
	@include('tambay_points._form')
	{!! Form::close() !!}
	
@stop