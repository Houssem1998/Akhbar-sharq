@extends('dashboard.layouts.default')
@section('pageTitle', 'Admin Post Controller')
@section('content')
<div class="container-fluid">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
      <div class="col-md-12">
        <!-- /.card -->
        <form method="POST" id="event-form" action="{{ route('write.update',[app()->getlocale(),$post->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
        <div class="card card-info">
            <div class="card-header">
                    <div class="row">
                            <div class="col-md-3">
                                <h3 class="card-title">{{ __('Create a Post') }}</h3>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3">
                                <a href="{{ route('write.index',app()->getlocale()) }}" style="position: absolute;
                                right: 20px;"><label for="">All Posts&nbsp;&nbsp;</label><i class="fas fa-eye" ></i></a>
                            </div>
                    </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Title<i class="red">*</i>:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sub-Title:</label>
                            <input type="text" class="form-control" id="subTitle" name="subTitle" value="{{ $post->subTitle }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!--ImageUP-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputFile">Post Cover Image<i class="red">*</i>:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                                <input name="image" type="file" class="custom-file-input" id="exampleInputFile" onchange="readURL(this);">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Writer Name<i class="red">*</i>:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $post->name }}">
                                    </div>
                                    <label for="exampleInputFile">Writer Image:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                                <input name="writerImage" type="file" class="custom-file-input" id="exampleInputFile" onchange="readURL(this);">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>Your Uploaded picture will be stremed here:</p>
                                    <img id="blah" class="imgg" src="" alt=""/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Writer profile picture</label>
                                    <img src="{{ $post->writerImage }}" alt="" style="width: 100%" class="img-circle img-fluid">
                                </div>
                                <div class="col-md-6">
                                    <label>Cover Post Image</label>
                                    <img src="{{ $post->image }}" alt="" style="width: 100%" >
                                </div>
                            </div>
                        </div>
                        <!--/ImageUP-->
                    </div>
                    <div class="col-md-6">
                        <!--CategorySel-->
                        <div class="form-group">
                            <label>Category<i class="red">*</i>:</label>
                            <select class="form-control select2" style="width: 100%;" name="category" id="category">
                                @foreach($categories as $category)
                                    <option @if($category->name === $post->category)selected="selected"@endif value ="{{ $category->name }}" >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--/.CategorySel-->

                        <!-- Date mm/dd/yyyy -->
                        <div class="form-group">
                            <label>Wroted At:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask id="wroted_at" name="wroted_at" value="{{ $post->wroted_at }}">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Writer Email address<i class="red">*</i>:</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $post->email }}">
                        </div>
                        <div class="form-group">
                            <label for="resource">Resource:</label>
                            <input type="text" name="resource" class="form-control" id="resource" placeholder="Enter resource" value="{{ $post->resource }}">
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <label>Post Body<i class="red">*</i>:</label><br/>
                    <div class="row">
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                              <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                              <i class="fas fa-times"></i></button>
                          </div>
                          <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pad">
                          <div class="mb-3">
                            <textarea dir="rtl" class="textarea" placeholder="Place some text here"
                                      style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="body" name="body" dir="rtl">{{ $post->body }}</textarea>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="icheck-danger d-inline">
                        <input type="radio" name="urgent" id="urgent" value="1" @if($post->urgent === 1) checked @endif>
                        <label for="urgent">
                        Urgent
                        </label>
                    </div>
                </div>
                <!--Status Check Box-->
                <div class="col-md-6">
                    <div class="form-group clearfix">
                        <label>Status<i class="red">*</i>:</label><br/>
                        <div class="icheck-success d-inline">
                            <input type="radio" name="status" id="statusShow" value="1"
                            @if($post->status === 1)
                                checked
                            @endif
                            >
                            <label for="statusShow">
                                Share
                            </label>
                            <div class="icheck-danger d-inline">
                                <input type="radio" name="status" id="statusHide" value="0" @if($post->status === 0)
                                checked
                                @endif>
                                <label for="statusHide">
                                Hide
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Status Check Box-->

            </div>
              </div>
          <!-- /.card-body -->
            <div class="card-footer">

                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
        <!-- /.card -->
    </form>
      </div>
      <!-- /.col (left) -->
      <div class="col-md-6">

      </div>
      <!-- /.col (right) -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

@stop
