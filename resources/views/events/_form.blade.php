<div>
	@include('includes.required_errors')
	<table> 
		<tbody>
			<tr>
				<td> {!! Form::label('name', 'Event Name: ') !!}</td>
				<td> {!! Form::text('name', old('name'), ['class' => 'span7 form-control']) !!} </td>
			</tr>
		</tbody> 
	</table>
	
	<br>
	<div class = "submit">
		{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
		<a href="{{ action ('EventsController@index') }}"><button type="button" class="btn btn-info">Back</button></a>
	</div>
</div>
