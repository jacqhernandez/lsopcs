@extends('layouts.app')
@section('content')
<br>
<h2>Points</h2>
<hr>

{!!  Form::open(['route' => ['points.search'], 'method' => 'get', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
<div class="form-group">
{!!  Form::text('query', null, ['placeholder' => 'Member Name', 'class' => 'form-control'])  !!} 
</div>
{!!  Form::submit('Search', ['class' => 'btn btn-default'])  !!}
{!!  Form::close() !!}

{!!  Form::open(['route' => ['points.filter'], 'method' => 'get', 'class' => 'navbar-form navbar-right'])  !!}
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
			<th>Name</th>
			<th>Department</th>
			@foreach($events as $event)
				<th>{{ $event-> name}}</th>
			@endforeach
			<th>Total Points</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach ($members as $member)
		<tr>
			<td><a href="{{ action('MembersController@show', [$member->id]) }}">{{$member->last_name}}, {{ $member->first_name }}</a></td>
			<td>{{ $member->department }}</td>
			@foreach ($events as $event)
				<?php
					$member_point = App\Point::where('event_id',$event->id)->where('member_id',$member->id)->first();
				?>
				@if (is_null($member_point))
				<td>0</td>
				@else
				<td>{{ $member_point->point }}</td>
				@endif
			@endforeach
			<td>{{ $member->total_points }}</td>
			<td><a href="{{ action ('PointsController@create', [$member->id]) }}">Add Points</a></td>
		</tr>
		@endforeach
	</tbody> 
</table>

@stop
