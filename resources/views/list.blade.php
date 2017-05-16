<!DOCTYPE html>
<html lang="en">
	<head>
		
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
		
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		
		<!-- Latest compiled and minified JavaScript -->
	</head>
	<body>
		<div id="content">
			<center>
			<h2>TABLE DOCTOR</h2>
			</center>
			<!-- Standard button -->
			<a href="/laravel/menu"><button type="button" class="btn btn-default" name="return">RETURN</button></a>
			<a href="{{route('doctor.create')}}"><button type="button" class="btn btn-success">ADD</button></a>
			<a id="btnrefresh"><button type="button" class="btn btn-success" >REFRESH</button></a>
			<table id="example" class="display" width="100%">
				<thead>
					<th>STT</th>
					<th>NAME</th>
					<th>DISEASE</th>
					<th>PATIENT</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($doctors as $doctor)
					<tr id="{{$doctor->id}}">
						<td>{{$doctor->id}}</td>
						<td>{{$doctor->name}}</td>
						<td>
							@foreach($doctor->diseases as $disease)
							{{$disease->name}},
							@endforeach
						</td>
						<td>
							@foreach($doctor->diseases as $disease)
								@foreach($disease->patients as $patient)
									{{$patient->name}},
								@endforeach
							@endforeach
						</td>
						<td>
							<button type="button" class="btn btn-danger btn-xs" class="btndelete"  name="delete" value="{{$doctor->id}}">DELETE</button>
							<a href="{{ route('doctor.edit',['id'=>$doctor->id]) }}">
								<button type="button" class="btn btn-default btn-xs" name="edit" >EDIT</button>
							</a>
						</td>
					</tr>
					@endforeach
					
					
				</tbody>
				
			</table>
			
		</div>
		<script type="text/javascript" charset="utf8"  src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
	</body>
	<script type="text/javascript">
		$(document).ready(function(){
			//table
		$('#example').DataTable();
			//refresh
			$('#btnrefresh').on('click',function(){
				$('#content').load('#example');
			});
			//delete
			
			
			$('button[name="delete"]').click(function(){
				var id=$(this).val();
				var url= $(location).attr('href');
				$.ajax({
					type:"DELETE",
					url: url+'/'+id,
					data:  {
						"_token": "{{ csrf_token() }}" },
					success:function(){
						alert("ban da xoa ");
						$('#content').load('#example');
					}
				});
				
			});
			$('#example tr').on('dblclick', function(){
				var id=$(this).attr('id');
				
				
			});
		});
			
		
	</script>
	
</html>