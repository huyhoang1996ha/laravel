<html>
	<center>
	{!!Form::open(array('route'=>'patient.store','method'=>'POST'))  !!}
	
		<form >
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
				<label>Name</label>
				<input type="text" name="name"><br/>
				<label>Age  </label>
				<input type="text" name="age"><br/>
				<select name="disease_id">
					@foreach($diseases as $disease)
						<option value="{{$disease->id}}">{{$disease->name}}</option>
					@endforeach
					</select>
				<input type="submit" value="submit">
	{!!Form::close()!!}
		</form>
	</center>

</html>