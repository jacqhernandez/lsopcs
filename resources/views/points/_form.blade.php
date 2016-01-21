<div>
	@include('includes.required_errors')
	<table> 
		<tbody>
			<tr>
				<td> {!! Form::label('event_id', 'Event: ') !!}</td>
				<td> {!! Form::select('event_id', $events, old('event_id'), ['class' => 'span7 form-control']) !!} </td>
			</tr>	

			<tr>
				<td> {!! Form::label('point', 'Points: ') !!}</td>
				<td> {!! Form::number('point', old('point'), ['class' => 'span7 form-control', 'min'=>1]) !!} </td>
			</tr>	

		</tbody> 
	</table>
	
	<br>
	<div class = "submit">
		{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
		<a href="{{ action ('PointsController@index') }}"><button type="button" class="btn btn-info">Home</button></a>
	</div>
</div>
