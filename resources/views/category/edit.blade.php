@extends('layouts.app')

@section('title_page','Add New Category')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h3>Edit Category {{$category->category_name}}</h3>
				<br>
				{{Form::model($category,['route'=>['category.update',$category],'method'=>'patch' ])}}
						@include('category._form')
				{{Form::close()}}
			</div>
		</div>
	</div>

@endsection