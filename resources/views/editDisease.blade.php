<!DOCTYPE html>
<html>
	{!! Form::open(array('method'=>'PUT','route'=>array('disease.update', $disease->id))) !!}
	<form>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<label>NAME</label>
		<input type="text" name="name" value="{{$disease->name}}">
		<label>DISEASE</label>
		<input type="text" name="major" value="{{$disease->major}}">
		<input type="submit" value="submit">
	</form>
	{!!Form::close()!!}
</html>