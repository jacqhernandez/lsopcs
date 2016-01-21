<div>
	@include('includes.required_errors')
	<table> 
		<tbody>
			<tr>
				<td> {!! Form::label('id_number', 'ID Number: ') !!}</td>
				<td> {!! Form::text('id_number', old('id_number'), ['class' => 'span7 form-control']) !!} </td>
			</tr>	

			<tr>
				<td> {!! Form::label('first_name', 'First Name: ') !!}</td>
				<td> {!! Form::text('first_name', old('first_name'), ['class' => 'span7 form-control']) !!} </td>
			</tr>	

			<tr>
				<td> {!! Form::label('last_name', 'Last Name: ') !!}</td>
				<td> {!! Form::text('last_name', old('last_name'), ['class' => 'span7 form-control']) !!} </td>
			</tr>

			<tr>
				<td> {!! Form::label('year', 'Year: ') !!}</td>
				<td> {!! Form::select('year', [1=>1,2=>2,3=>3,4=>4,5=>5], old('year'), ['class' => 'span7 form-control']) !!} </td>
			</tr>		
			
			<tr>
				<td> {!! Form::label('course', 'Course: ') !!}</td>
				<td> {!! Form::text('course', old('course'), ['class' => 'span7 form-control']) !!} </td>
			</tr>

			<tr>
				<td> {!! Form::label('email', 'Email: ') !!}</td>
				<td> {!! Form::email('email', old('email'), ['class' => 'span7 form-control']) !!} </td>
			</tr>

			<tr>
				<td> {!! Form::label('birthday', 'Birthday: ') !!}</td>
				<td> {!! Form::date('birthday', old('birthday'), ['class' => 'span7 form-control']) !!} </td>
			</tr>

			<tr>
				<td> {!! Form::label('status', 'Status: ') !!}</td>
				<td> {!! Form::select('status', [
						'Applicant' => 'Applicant', 
						'Representative' => 'Representative', 
						'Execom' => 'Execom'], 
					old('status'), ['class' => 'span7 form-control']) !!} </td>
			</tr>

			<tr>
				<td> {!! Form::label('department', 'Department: ') !!}</td>
				<td> {!! Form::select('department', [
						'Communications' => 'Communications',
						'Creatives' => 'Creatives',
						'Finance and Marketing' => 'Finance and Marketing',
						'Human Resources' => 'Human Resources',
						'Logistics' => 'Logistics',
						'Programs and Technicals' => 'Programs and Technicals',
						'Secretary-General' => 'Secretary-General'], 
					old('department'), ['class' => 'span7 form-control']) !!} </td>
			</tr>
		</tbody> 
	</table>
	
	<br>
	<div class = "submit">
		{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
		<a href="{{ action ('MembersController@index') }}"><button type="button" class="btn btn-info">Back</button></a>
	</div>
</div>
