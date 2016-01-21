@extends ('layouts.app')
@section('content')
	<h2>{{ $tambay_point->member->first_name }} {{ $tambay_point->member->last_name }}</h2>

	<table class="table">
		<tbody>
			<tr>
				<td>Date: </td>
				<td>{{ $date }}</td>
			</tr>
			
			<tr>
				<td>Duration: </td>
				<td>{{ $tambay_point['duration'] }}</td>
			
			<tr>
				<td>Points: </td>
				<td>{{ $tambay_point['point'] }}</td>
			</tr>
	
			<tr>
				<td><a href="{{ action ('TambayPointsController@create', [$tambay_point->member->id]) }}">Add Points</a></td>
				<td></td>
			</tr>
		</tbody>
	</table>

	<table>
		<tr>
			<td width="30%;">
				{!! Form::open(['route' => ['members.tambay_points.destroy', $tambay_point->member->id, $tambay_point->id], 'method' => 'delete' ]) !!}
					<a><button class="btn btn-danger">Delete</button></a>
				{!! Form::close() !!}
			</td>
			<td width="30%;">
				<a href="{{ action ('TambayPointsController@index') }}"><button type="button" class="btn btn-info">Back</button></a>	
			</td>
		</tr>
	</table>

	

	
@stop