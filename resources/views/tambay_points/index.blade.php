@extends('layouts.app')
@section('content')
<br>
<h2>Tambay Points</h2>
<hr>

{!!  Form::open(['route' => ['tambay_points.search'], 'method' => 'get', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
<div class="form-group">
{!!  Form::text('query', null, ['placeholder' => 'Member Name', 'class' => 'form-control'])  !!} 
</div>
{!!  Form::submit('Search', ['class' => 'btn btn-default'])  !!}
{!!  Form::close() !!}

{!!  Form::open(['route' => ['tambay_points.filter'], 'method' => 'get', 'class' => 'navbar-form navbar-right'])  !!}
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
			<th>ID Number</th>
			<th>Name</th>
			<th>Status</th>
			<th>Department</th>
			@for ($i = 1; $i <= 10; $i++)
			<th>T{{ $i }}</th>
			@endfor
			<th>Total Tambay Points</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach ($members as $member)
		<tr>
			<td>{{ $member->id_number }}</td>
			<td><a href="{{ action('MembersController@show', [$member->id]) }}">{{$member->last_name}}, {{ $member->first_name }}</a></td>
			<td>{{ $member->status }}</td>
			<td>{{ $member->department }}</td>
			<?php
				$tambay_points = App\TambayPoint::where('member_id',$member->id)->get();
				$total_tambay_points = 0;
				$difference = 10 - count($tambay_points);
			?>
			@foreach ($tambay_points as $tambay_point)
				<td><a href="{{ action('TambayPointsController@show', [$member->id, $tambay_point->id]) }}">{{ $tambay_point->point }}</td>
				<?php
					$total_tambay_points += $tambay_point->point;
				?>
			@endforeach
			@for ($i = 1; $i <= $difference; $i++)
				<td> - </td>
			@endfor
			<td>{{ $total_tambay_points }}</td>
			<td><a href="{{ action ('TambayPointsController@create', [$member->id]) }}">Add Points</a></td>
		</tr>
		@endforeach
	</tbody> 
</table>

@stop
