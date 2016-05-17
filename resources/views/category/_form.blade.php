<div class="row">
	<div class="col-md-6">
		<div class="form-group {{ $errors ->has('category_name') ? 'has-error' : ''}}">
			
			{{Form::label('Nama Kategori','Nama Kategori')}}

			
			{{Form::text('category_name',null,['class'=>'form-control'])}}

			  @if ($errors->has('category_name'))
		        <span class="help-block">
		                 <strong>{{ $errors->first('category_name') }}</strong>
		         </span>
		       @endif
			
			
			
		</div>
</div>
</div>


<div class="row">
	<div class="col-md-6">
		<div class="form-group ">
		
			{{Form::submit('Save',['class'=>'btn btn-danger'])}}
			
			
		</div>
</div>
</div>

	