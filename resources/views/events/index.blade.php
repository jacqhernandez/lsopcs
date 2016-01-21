@extends('layouts.app')
@section('content')
<br>
<h2>Events</h2>
<hr>


<br><br>
<table class="table table-hover sortable"> 
	<thead>
		<tr>
			<th>Name</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach ($events as $event)
		<tr>
			<td>{{ $event->name }}</td>
			<td>
				{!! Form::open(['route' => ['events.edit', $event->id], 'method' => 'get' ]) !!}
					<button class="btn btn-info">Edit</button>
				{!! Form::close() !!}
			</td>
			<td>
				{!! Form::open(['route' => ['events.destroy', $event->id], 'method' => 'delete' ]) !!}
					<button class="btn btn-warning">Delete</button>
				{!! Form::close() !!}
			</td>
		</tr>
		@endforeach
	</tbody> 
</table>
<a href="{{ url('/events/create') }}">New Event</a>

@stop
