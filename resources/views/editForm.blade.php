@extends('template')
@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

@stop
@section('content')

		{!! Form::open(array('method'=>'PUT','route'=>array('doctor.update', $doctor->id))) !!}
		
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label for="name">NAME</label>
				<input type="text" class="form-control" name="name" value="{{$doctor->name}}" placeholder="">
			</div>
			<div class="form-group">
				<label for="disease_id">DISEASE</label>
				<select class="form-control" name="disease_id[]" multiple>
				@foreach($diseases as $disease)
					<option value="{{$disease->id}}">{{$disease->name}}</option>}
				@endforeach
				</select>
			</div>
			<div class="form-group">
				<input type="submit" class="form-group" name="submit" value="submit">
			</div>
		
		{!!Form::close()!!}
@stop
@section('js')
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
		<script type="text/javascript">
				
				$(document).ready(function(){

					$('select').select2();
			
				});
		</script>
@stop