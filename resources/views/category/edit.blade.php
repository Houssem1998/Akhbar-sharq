@extends('dashboard.layouts.default')
@section('pageTitle', 'Admin Category Creator')
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
            <form method="POST" id="event-form" action="{{ route('category.update',[app()->getlocale(),$category->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <h3 class="card-title">Update Category</h3>
                <div class="form-group">
                    <br /><br />
                    <input type="text" class="form-control" placeholder="Enter category title here" id="name" name="name" value="{{ $category->name }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
      <!-- /.col (left) -->
      <div class="col-md-6">
        <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">List Category</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th style="text-align: right">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('category.edit',[app()->getlocale(),$category->id])}}" style="width: 150px">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <button class="btn btn-danger btn-sm" href="#"style="width: 150px" data-toggle="modal" data-target="#delete-{{ $category->id }}">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </button>
                            <div class="modal fade" id="delete-{{ $category->id }}">
                                <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Delete: {{ $category->name }}</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <form method="POST" action="{{ route('category.destroy',[app()->getlocale(), $category->id]) }}" >
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
                            <!-- /.modal -->

                            </td>
                        </tr>

                      @endforeach
                  </tbody>
                </table>
              </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div>
      <!-- /.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->

@stop
