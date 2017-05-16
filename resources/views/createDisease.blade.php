<html>
	<center>
	{!!Form::open(['route'=>'disease.store','method'=>'POST'])!!}
	
		<form >
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
				<label>Name</label>
				<input type="text" name="name"><br/>
				<label>Major  </label>
				<input type="text" name="major"><br/>
				
				<input type="submit" value="submit">
	{!!Form::close()!!}
		</form>
	</center>

</html>