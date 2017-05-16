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
					<select name="disease_id">
					@foreach($diseases as $disease)
						<option value="{{$disease->id}}">{{$disease->name}}</option>
					@endforeach
					</select>
				</tr>
				
				<tr>
					<td><input type="submit" name="submit" value="submit"></td>
				</tr>
			</table>
		</form>
		{!!Form::close() !!}
	</body>
	<script>
		$(document).ready(function() {
			
		});
	</script>
</html>