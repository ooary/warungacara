                     <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <div class="row">
                            <label class="col-md-4 control-label">Judul Event</label>

                            <div class="col-md-6">
                                {{Form::text('title',null,['class'=>'form-control'])}}

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                        </div>
                      <div class="form-group{{ $errors->has('category_lists') ? ' has-error' : '' }}">
                        <div class="row">
                            <label class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                    {!! Form::select('category_lists[]',[''=>'']+App\Category::lists('category_name','id')->all(), null, ['class'=>'js-selectize', 'multiple']) !!}

                                @if ($errors->has('category_lists'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_lists') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <div class="row">
                            <label class="col-md-4 control-label">Gambar</label>

                            <div class="col-md-6">
                               {{Form::file('image')}}

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif

                            </div>
                            @if (isset($model) && $model->image !== '')
                                <div class="row">
                                    <div class="col-md-6">
                                         <p>Gambar Sebelumnya:</p>
                                            <div class="thumbnail">
                                              <img src="{{ url('/img/' . $model->image) }}" class="img-rounded">
                                            </div>
                                    </div>
                                </div>
                             @endif
                        </div>  
                        </div>

                         <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <div class="row">
                                <label class="col-md-4 control-label">Deskripsi Event</label>

                                <div class="col-md-6">

                                    {{Form::textarea('content',null,['class'=>'form-control'],['id'=>'content'])}}
                                    <script>
                                        CKEDITOR.replace('content')

                                    </script>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>  
                            </div>
                              <div class="form-group{{ $errors->has('editor1') ? ' has-error' : '' }}">
                            <div class="row">
                                <label class="col-md-4 control-label"></label>

                                <div class="col-md-6">

                                   {{Form::submit(isset($model)? 'Update' :'Posting',['class'=>'btn btn-primary'])}}
                                </div>
                            </div>  
                            </div>

         
                       

                   

                   
                   

                    