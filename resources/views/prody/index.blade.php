@extends('../layouts/app')

@section('title_page','Program Study')

@section('content')


		<div class="container">
		    <div class="row">
		        <div class="col-md-10 col-md-offset-1">
		            <div class="panel panel-default">
		                <div class="panel-heading">Daftar Program Study</div>
						
		                <div class="panel-body">
		                	<h3>Prody <a href="{{URL('prody/create')}}" class="btn btn-primary">New Prody</a></h3>
		                	<br>
		                    <table class="table">		                    
		                    	<tr>
		                    		<td>No</td>
		                    		<td>Nama </td>
		                    		<td>Action</td>
		                    	</tr>
		                    	<?php $no = 1;?>
		                    	@foreach($prody as $data)
		                    	<tr>
		                    		<td>{{$no++}}</td>
		                    		<td>{{$data -> name}}</td>
		                    		<td>
									{{Form::model($data,['route'=>['prody.destroy',$data],'method'=>'delete','class'=>'form-inline','onsubmit'=>'return confirm("are you sure?")'])}}
		                    			<a href="{{URL('prody')}}/{{$data->id}}/edit" class="btn btn-warning">Edit</a>
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
		</div>


@endsection