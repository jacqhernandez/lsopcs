@extends('layouts.app')
@section('content')

<h2>Edit Member</h2>
<hr>

	{!! Form::model($member, ['method' => 'PATCH', 'action' => ['MembersController@update', $member->id]]) !!}
	@include('members._form')
	{!! Form::close() !!}
	
@stop