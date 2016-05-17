@extends('layouts.app')

@section('title_page','Add New Prody')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h3>New Prody</h3>
				<br>
				{{Form::open(['route'=>'prody.store'])}}
						@include('prody._form')
				{{Form::close()}}
			</div>
		</div>
	</div>

@endsection