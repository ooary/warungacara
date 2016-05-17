@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Event </div>
                <div class="panel-body">
                   {{Form::model($event,['route'=>['event.update',$event],'files'=>true,'method'=>'patch'])}}
                            
                            @include('event._form',['model'=>$event])
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
