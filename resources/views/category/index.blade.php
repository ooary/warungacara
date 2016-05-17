@extends('../layouts/app')

@section('title_page','Category Event')

@section('content')


		<div class="container">
		    <div class="row">
		        <div class="col-md-10 col-md-offset-1">
		            <div class="panel panel-default">
		                <div class="panel-heading">Daftar Category</div>
						<div class="panel-body">
								<h3>Daftar Category <a href="{{URL('category/create')}}" class="btn btn-primary">Add Category</a></h3>							
							<table class="table">
								<tr>
									<td>No</td>
									<td>Category</td>					
									<td>Action</td>

								</tr>
								<?php $no = 1;?>
								@foreach($category as $data)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$data -> category_name}}</td>
									<td>
			                				{{Form::model($data,['route'=>['category.destroy',$data],'method'=>'delete','class'=>'form-inline','onsubmit'=>'return confirm("are you sure?")'])}}
			                    			<a href="{{URL('category')}}/{{$data->id}}/edit" class="btn btn-warning">Edit</a>
			                    			{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
			                    		{{Form::close()}}
			                    		</td>

								</tr>
								@endforeach
							</table>	


						</div>
		               
		      		</div>
		    </div>
		</div>


@endsection