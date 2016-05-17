@extends('layouts.app')

@section('title_page','Manage Account')

@section('content')
	
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading">
							List Account
						</div>
						<div class="panel-body">
							<h3>Account <a href="{{URL('account/create')}}" class="btn btn-primary">New Account</a></h3>
		                	<br>
		                	<table class="table">
		                		<thead>
		                			<tr>
		                			<td>No</td>
		                			<td>Name</td>
		                			<td>Email</td>
		   
		                			<td>Role</td>
		                			<td>Action</td>
		                		</tr>
		                		</thead>
		                		
		                		<?php
		                			$no = 1;
		                		?>
		                		<tbody>
		                				@foreach($user as $data)
		                			<tr>
			                			<td>{{$no++}}</td>
			                			<td>{{$data -> name}}</td>
			                			<td>{{$data -> email}}</td>

			                		
			                		
			                			<td>{{$data -> role}}</td>

			                			<td>
			                				{{Form::model($data,['route'=>['account.destroy',$data],'method'=>'delete','class'=>'form-inline','onsubmit'=>'return confirm("are you sure?")'])}}
			                				<a href="{{URL('account')}}/{{$data->id}}" class="btn btn-primary">Show</a>
			                    			<a href="{{URL('account')}}/{{$data->id}}/edit" class="btn btn-warning">Edit</a>
			                    			{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
			                    		{{Form::close()}}
			                    		</td>
		                		</tr>
		                		@endforeach

		                		</tbody>
		                	
		                	</table>
						</div>
					</div>
				</div>
			</div>
		</div>


@endsection
