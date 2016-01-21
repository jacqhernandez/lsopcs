@extends('layouts.app')
@section('content')
<br>
<h2>Members</h2>
<hr>

{!!  Form::open(['route' => ['members.search'], 'method' => 'get', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
<div class="form-group">
{!!  Form::text('query', null, ['placeholder' => 'Member Name', 'class' => 'form-control'])  !!} 
</div>
{!!  Form::submit('Search', ['class' => 'btn btn-default'])  !!}
{!!  Form::close() !!}

{!!  Form::open(['route' => ['members.filter'], 'method' => 'get', 'class' => 'navbar-form navbar-right'])  !!}
<div class="form-group">
{!! Form::select('filter', [
						'' => 'Filter by Department',
						'Communications' => 'Communications',
						'Creatives' => 'Creatives',
						'Finance and Marketing' => 'Finance and Marketing',
						'Human Resources' => 'Human Resources',
						'Logistics' => 'Logistics',
						'Programs and Technicals' => 'Programs and Technicals',
						'Secretary-General' => 'Secretary-General'], 
					 	old('filter'), ['class' => 'form-control', 'onchange' => 'this.form.submit()']) !!}
</div>
{!!  Form::close() !!}


<br><br><br><br>
<table class="table table-hover sortable"> 
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Department</th>
			<th>Status</th>
			<th>Total Points</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach ($members as $member)
		<tr>
			<td>{{ $member->first_name }}</td>
			<td>{{ $member->last_name }}</td>
			<td>{{ $member->department }}</td>
			<td>{{ $member->status }}</td>
			<td>{{ $member->total_points }}</td>
			<td><a href="{{ action ('MembersController@show', [$member->id]) }}">View</a></td>
			<td><a href="{{ action ('PointsController@create', [$member->id]) }}">Add Points</a></td>
		</tr>
		@endforeach
	</tbody> 
</table>
<a href="{{ url('/members/create') }}">New Member</a>

@stop
