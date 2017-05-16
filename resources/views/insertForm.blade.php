<html>
	<head>
		<title>insert doctor</title>
	</head>
	<body>
		{!!Form::open(['action'=>'DoctorController@store','mehotd'=>'POST'])  !!}
		<form >
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<table>
				<tr>
					<td>NAME</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					{!!Form::select('namedisease',$namedisease) !!}
				</tr>
				
				<tr>
					<td><input type="submit" name="submit" value="submit"></td>
				</tr>
			</table>
		</form>
		{!!Form::close() !!}
	</body>
</html>