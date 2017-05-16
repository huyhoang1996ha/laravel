<!DOCTYPE html>
<html lang="en">
<head>
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body>
<div id="content">
	<center>
		<h2>TABLE DISEASE</h2>
	</center>
		<!-- Standard button -->
	<a href="/laravel/menu"><button type="button" class="btn btn-default" name="return">RETURN</button></a>
	<button type="button" class="btn btn-success" name="add">ADD</button>
	<button type="button" class="btn btn-success" name='refresh' >REFRESH</button>

	<table id="example" class="display" width="100%">
		<thead>
			<th>STT</th>
			<th>NAME</th>
			<th>MAJOR</th>
			<th></th>
		</thead>
		<tbody>
			@foreach($diseases as $disease)
				<tr>
					<td>{{$disease->id}}</td>
					<td>{{$disease->name}}</td>
					<td>{{$disease->major}}</td>
					<td>
						<button name="delete" class="btn btn-danger btn-xs" value="{{$disease->id}}">DELETE</button>
						<a href="{!! action('DiseaseController@edit',['id'=>$disease->id]) !!}">
						<button class="btn btn-default btn-xs" name="edit" >EDIT</button>
					</a>
					</td>
				</tr>

			@endforeach
		</tbody>
		
	</table>
</div>
	<script type="text/javascript" charset="utf8"  src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  		<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
</body>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').dataTable();
		$('button[name="refresh"]').on('click', function(){
			$('#content').load('#example');
		});
		$('button[name="add"]').on('click', function(){
			$(location).attr('href', '{{ route('disease.create') }}');
		});
		$('button[name="delete"]').on('click', function(){
			var url=$(location).attr('href');
			var id=$(this).val();
			
			$.ajax({
			type:"DELETE",
			url: url + "/" + id,
			data:  { 
				 "_token": "{{ csrf_token() }}" },
			 success:function(){
				 alert("ban da xoa ");
				 $('#content').load('#example');
			}
		});
		});
		

	});


	</script>
	 
</html>