@extends('dashboard.layouts.default')
@section('pageTitle', 'Admin Notification Creator')
@section('content')

<div class="container-fluid">
    @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul>
            </div><br />
          @endif
    <div class="row">
        <div class="col-md-6">
            <form method="POST" id="event-form" action="{{ route('notification.store',app()->getlocale()) }}" enctype="multipart/form-data">
                @csrf
                <h3 class="card-title">Notification Title<i class="red">*</i>:</h3>
                <div class="form-group">
                    <br /><br />
                    <input type="text" class="form-control" placeholder="Enter notification title here" id="title" name="title" value="{{ old('title') }}">
                </div>
                <h3 class="card-title">Notification Body<i class="red">*</i>:</h3>
                <div class="form-group">
                    <br /><br />
                    <textarea type="text" class="form-control" name="body" id="" cols="30" rows="10" placeholder="Enter notification body here" id="body" name="body" >{{ old('body') }}</textarea>
                </div>
                <div class="form-group">
                    <h3>Type:</h3>
                    <select class="form-control select2" style="width: 100%;" name="type" id="type">
                        <option selected="selected" value ="danger" >Urgent</option>
                        <option value ="info" >Info</option>
                        <option value ="warning" >Warning</option>
                        <option value ="success" >Seccess</option>
                    </select>
                </div>
                <!--CategorySel-->
                <div class="form-group">
                    <h3>Category:</h3>
                    <select class="form-control select2" style="width: 100%;" name="category" id="category">
                        @foreach($categories as $category)
                            <option @if($category->name === old('category'))selected="selected"@endif value ="{{ $category->name }}" >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!--/.CategorySel-->
                <button type="submit" class="btn btn-primary">Creat</button>
            </form>
        </div>
      <!-- /.col (left) -->
      <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Notification  - {{$notifications->count()}} -</h3>

              <div class="card-tools">



                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
                @foreach($notifications as $notification)
                    <div class="callout callout-{{ $notification->type }}">
                        <h5 class="ar">{{ $notification->title }}</h5>

                        <p class="ar">{{ $notification->body }}</p>
                        <p class="ar">{{ $notification->category }}</p>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-danger btn-sm col-4" href="#"style="width: 150px" data-toggle="modal" data-target="#delete-{{ $notification->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                            <a href="{{ route('notification.edit',[app()->getlocale(), $notification->id])}}" class="btn btn-warning"><i class="fas fa-tools"></i></a>
                        </div>
                    </div>

                    <div class="modal fade" id="delete-{{ $notification->id }}">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Delete: {{ $notification->title }}</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Are you sure you want to delete notification</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <form action="{{ route('notification.destroy',[app()->getlocale(), $notification->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" href="#"style="width: 150px">
                                YES
                                </button>
                            </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                @endforeach

            </div>
        <!-- /.card-body -->
      </div>
      <!-- /.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->

@stop
