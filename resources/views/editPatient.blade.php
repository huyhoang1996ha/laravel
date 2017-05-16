<!DOCTYPE html>
<html>
	{!! Form::open(array('method'=>'PUT','route'=>array('patient.update', $patient->id))) !!}
	<form>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<label>NAME</label>
		<input type="text" name="name" value="{{$patient->name}}">
		<label>AGE</label>
		<input type="number" name="age" value="{{$patient->age}}">
		<select name="disease_id">
						@foreach($diseases as $disease)
						<option value="{{$disease->id}}">{{$disease->name}}</option>
						@endforeach
					</select>
		<input type="submit" value="submit">
	</form>
	{!!Form::close()!!}
</html>