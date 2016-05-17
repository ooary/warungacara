@extends('../layouts/app')

@section('title_page','Event')

@section('content')


		<div class="container">
		    <div class="row">
		        <div class="col-md-10 col-md-offset-1">
		            <div class="panel panel-default">
		                <div class="panel-heading">Daftar Event</div>
						
		                <div class="panel-body">
		                	
		                	<h3>Event 
		                	
		                		<a href="{{URL('event/create')}}" class="btn btn-primary">New Event</a>
		                	
		                	</h3>
		                	<br>
		                	<table class="table">
		                			<tr>
		                				<td>No</td>
		                				<td>Title</td>
		                				<td>Category</td>
		                				<td>Posted by</td>
		                				<td>Action</td>
		                			</tr>
		                			<?php
		                				$no = 1;
		                			?>
		                			@foreach($event as $data)
		                			<tr>
		                				<td>{{$no++}}</td>
		                				<td>{{$data -> title}}</td>

		                				<td>
		                					@foreach($data->categories as $category)
		                					<span class="label label-primary">

                						    <i class="fa fa-btn fa-tags"></i>	
		                					{{$category -> category_name}}

		                				    </span>
		                					@endforeach

		                				</td>
		                				<td>
		                					{{$data -> posted -> name}}
		                				</td>
		                				<td>
		                				{{Form::model($data,['route'=>['event.destroy',$data],'method'=>'delete','class'=>'form-inline','onsubmit'=>'return confirm("Are you Sure?")'])}}
		                				<a href="{{URL('event')}}/{{$data->slug_title}}/edit" class="btn btn-info btn-sm">Edit</a>
		                				@can('admin-access')
		                				{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
		                				@endcan
		                				</td>
		                			</tr>
		                			@endforeach
		                	</table>	


							

		                </div>
		            </div>
		        </div>
		    </div>
		</div>


@endsection