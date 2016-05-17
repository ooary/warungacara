@extends('layouts.app')

@section('title_page','Edit  Prody')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h3>Edit Prody </h3>
				<br>
				{{Form::model($prody,['route'=>['prody.update',$prody],'method'=>'patch' ])}}
						@include('prody._form',['model'=>$prody])
				{{Form::close()}}
			</div>
		</div>
	</div>

@endsection