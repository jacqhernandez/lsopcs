@extends ('layouts.app')
@section('content')
	<h2>{{ $member['first_name'] }} {{ $member['last_name'] }}</h2>

	<table class="table">
		<tbody>
			<tr>
				<td>ID Number: </td>
				<td>{{ $member['id_number'] }}</td>
			</tr>
			
			<tr>
				<td>First_Name: </td>
				<td>{{ $member['first_name'] }}</td>
			
			<tr>
				<td>Last_Name: </td>
				<td>{{ $member['last_name'] }}</td>
			</tr>
		
			<tr>
				<td>Year: </td>
				<td>{{ $member['year'] }}</td>
			</tr>

			<tr>
				<td>Course: </td>
				<td>{{ $member['course'] }}</td>
			</tr>
			
			<tr>
				<td>Email: </td>
				<td>{{ $member['email'] }}</td>
			</tr>
			
			<tr>
				<td>Birthday: </td>
				<td>{{ $birthday }}</td>
			</tr>

			<tr>
				<td>Status:</td>
				<td>{{ $member['status'] }}</td>
			</tr>

			<tr>
				<td>Department: </td>
				<td>{{ $member['department'] }}</td>
			</tr>

			<tr>
				<td>Total Points: </td>
				<td>{{ $member['total_points'] }}</td>
			</tr>

			<tr>
				<td><a href="{{ action ('PointsController@create', [$member->id]) }}">Add Points</a></td>
				<td></td>
			</tr>
		</tbody>
	</table>



	<table class="table table-hover sortable"> 
		<thead>
			<tr>
				<th>Event</th>
				<th>Points</th>
			</tr>
		</thead>
		
		<tbody>
			@foreach ($points as $point)
			<tr>
				<td>{{ $point->event->name }}</td>
				<td>{{ $point->point }}</td>
				<td>
					{!! Form::open(['route' => ['members.points.destroy', $member->id, $point->id], 'method' => 'delete' ]) !!}
						<a><button class="btn btn-danger">Delete</button></a>
					{!! Form::close() !!}
				</td>

			</tr>
			@endforeach
			<tr>
				<td><a href="{{ action ('TambayPointsController@create', [$member->id]) }}">Add Tambay Points</a></td>
				<td></td>
			</tr>
		</tbody> 
	</table>

	
	<table class="table table-hover sortable"> 
		<thead>
			<tr>
				<th>Date</th>
				<th>Duration</th>
				<th>Points</th>
			</tr>
		</thead>
		
		<tbody>
			@foreach ($tambay_points as $tambay_point)
			<tr>
				<?php
					$date = Carbon\Carbon::parse($tambay_point->date)->toFormattedDateString();
				?>
				<td>{{ $date }}</td>
				<td>{{ $tambay_point->duration }}</td>
				<td>{{ $tambay_point->point }}</td>
				<td>
					{!! Form::open(['route' => ['members.tambay_points.destroy', $member->id, $tambay_point->id], 'method' => 'delete' ]) !!}
						<a><button class="btn btn-danger">Delete</button></a>
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody> 
	</table>

	<table>
		<tr>
			<td width="25%;">
				<a href="{{ action ('MembersController@edit', $member->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>	
			</td>
			<td width="30%;">
				{!! Form::open(['route' => ['members.destroy', $member->id], 'method' => 'delete' ]) !!}
					<button class="btn btn-danger">Delete</button>
				{!! Form::close() !!}
			</td>
			<td width="30%;">
				<a href="{{ action ('PointsController@index') }}"><button type="button" class="btn btn-info">Home</button></a>	
			</td>
		</tr>
	</table>

	

	
@stop