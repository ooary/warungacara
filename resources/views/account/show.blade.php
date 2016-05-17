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
							
							<table class="table">
								<tr>

									<td>{{$user -> email}}</td>
								
								</tr>
								<tr>
									<td>{{$user -> name}}</td>
									
								</tr>
								<tr>
									<td>{{$user -> role}}</td>
									
								</tr>
								<tr>

									<td>
										@if($user->prody_id == 0)
											admin
										@else
										{{$user->prody->name}}
										@endif
										</td>
									
								</tr>
							</table>

						</div>

					</div>
				</div>
			</div>
		</div>

@endsection