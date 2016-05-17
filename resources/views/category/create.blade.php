@extends('layouts.app')

@section('title_page','Add New Category')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h3>New Category</h3>
				<br>
				{{Form::open(['route'=>'category.store'])}}
						@include('category._form')
				{{Form::close()}}
			</div>
		</div>
	</div>

@endsection