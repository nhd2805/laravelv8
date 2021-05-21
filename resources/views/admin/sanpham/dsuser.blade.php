@extends('admin.layout.index')
@section('Content')
<table border="1" width="100%" style="margin-left: 5px;margin-right: 5px">
	<thead>
		<tr align="center">
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Email_Verified_At</th>
			<th>PassWord</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($sp as $sp)
		<tr align="center">
			<td>{{$sp->id}}</td>
			<td>{{$sp->name}}</td>
			<td>{{$sp->email}}</td>
			<td>{{$sp->email_verified_at}}</td>
			<td>{{$sp->password}}</td>
			<td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="#">Edit</a></td>
			<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="#">Delete</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
<p></p>
@endsection