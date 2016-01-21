<div>
	@include('includes.required_errors')
	<table> 
		<tbody>
			<tr>
				<td> {!! Form::label('date', 'Date: ') !!}</td>
				<td> {!! Form::date('date', old('date'), ['class' => 'span7 form-control']) !!} </td>
			</tr>

			<tr>
				<td> {!! Form::label('duration', 'Duration: ') !!}</td>
				<td> {!! Form::number('duration', old('duration'), ['class' => 'span7 form-control', 'min'=>1]) !!} </td>
				<td> <i>minutes</i> </td>
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
