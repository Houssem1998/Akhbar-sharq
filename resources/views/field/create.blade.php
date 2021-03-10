@extends('dashboard.layouts.default')
@section('pageTitle', 'Admin Sections')
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
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">About</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="POST" id="event-form" action="{{ route('field.store',app()->getlocale()) }}" enctype="multipart/form-data">
                                @csrf
                                <h3 class="card-title">Title</h3>
                                <div class="form-group">
                                    <br /><br />
                                    <input type="text" class="form-control ar" placeholder="Enter About title here" id="title" name="title" value="{{ old('title') }}">
                                </div>
                                <h3 class="card-title">Body</h3>
                                <div class="form-group">
                                    <br/>
                                    <textarea type="text" class="form-control ar" placeholder="Enter About body text here" id="body" name="body"  cols="20" rows="8">{{ old('body') }}</textarea>
                                </div>
                                <input type="hidden" value="about" name="section">
                                <button type="submit" class="btn btn-primary">Creat</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-body">
                                @foreach(App\Models\Field::where('section','about')->get() as $about)
                                    <h3 class="ar">{{ $about->title }}</h3>
                                    <p class="ar">{{ $about->body }}</p>
                                    <div class="row">
                                        <a class="btn btn-info btn-sm" href="{{ route('field.edit',[app()->getlocale(),$about->id])}}" style="width: 150px">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                            <button class="btn btn-danger btn-sm" href="#"style="width: 150px" data-toggle="modal" data-target="#delete-{{ $about->id }}">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </button>
                                    </div>

                                    <div class="modal fade" id="delete-{{ $about->id }}">
                                        <div class="modal-dialog modal-md">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Delete: {{ $about->name }}</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              <form method="POST" action="{{ route('field.destroy',[app()->getlocale(), $about->id]) }}">
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
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Slideshow Cover Text</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                    <form method="POST" id="event-form" action="{{ route('field.store',app()->getlocale()) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" class="form-control ar" placeholder="" id="title" name="title" value="{{ old('title') }}">
                        </div>

                        <input type="hidden" value="coverText" name="section">

                        <button type="submit" class="btn btn-primary">create</button>

                    </form>


                </div>
                <div class="card-footer">
                    @foreach(App\Models\Field::where('section','coverText')->get() as $coverText)
                            <div class="card card-blue">
                                {{ $coverText->title }}
                                <div class="ar">
                                    <button class="btn btn-danger btn-sm" href="#"style="width: 150px" data-toggle="modal" data-target="#delete-{{ $coverText->id }}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </button>

                                    <div class="modal fade" id="delete-{{ $coverText->id }}">
                                        <div class="modal-dialog modal-md">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Are You Sure You Want to delete Image ?</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              <form method="POST" action="{{ route('field.destroy',[app()->getlocale(), $coverText->id]) }}">
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
                                </div>
                          </div>
                    @endforeach

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Home Slide Show Controller</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                    <form method="POST" id="event-form" action="{{ route('field.store',app()->getlocale()) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="gallery">
                            <img id="blah" width="600" height="400" src="" alt=""/>
                            <div class="desc">
                                <button type="submit" class="btn btn-primary col">Upload</button>
                            </div>
                        </div>
                        <div class="row input-group">

                            <input type="hidden" value="slideshow" name="section">

                            <div class="custom-file">
                                <input name="image" type="file" class="custom-file-input" id="exampleInputFile" onchange="readURL(this);">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="card-footer">
                    @foreach(App\Models\Field::where('section','slideshow')->get() as $slideshow)
                            <div class="gallery">
                                <a target="_blank" href="{{ $slideshow->image}}">
                                    <img src="{{ $slideshow->image}}" alt="" width="600" height="400">
                                </a>
                                <div class="desc">
                                    <button class="btn btn-danger btn-sm" href="#"style="width: 150px" data-toggle="modal" data-target="#delete-{{ $slideshow->id }}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </button>

                                    <div class="modal fade" id="delete-{{ $slideshow->id }}">
                                        <div class="modal-dialog modal-md">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Are You Sure You Want to delete Image ?</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              <form method="POST" action="{{ route('field.destroy',[app()->getlocale(), $slideshow->id]) }}">
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
                                </div>
                          </div>
                    @endforeach

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col (left) -->
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Add Social Media Links</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                    <form method="POST" id="event-form" action="{{ route('field.store',app()->getlocale()) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label>Social media:</label>
                                <select class="form-control select2" style="width: 100%;" id="title" name="title">
                                  <option selected="selected" value="Facebook">Facebook</option>
                                  <option value="Twitter">Twiter</option>
                                  <option value="Youtube">Youtube</option>
                                  <option value="Instagram">Instagram</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Link:</label>
                            <input type="text" class="form-control" placeholder="Enter your sub title here" id="body" name="body">
                        </div>
                        <input type="hidden" name="section" value="link">
                        <button type="submit" class="btn btn-primary">Creat</button>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th style="text-align: right">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach(App\Models\Field::where('section','link')->get() as $link)
                              <tr>
                                  <td>{{ $link->title }}</td>
                                  <td class="project-actions text-right">
                                      <form action="{{ route('field.destroy',[app()->getlocale(),$link->id]) }}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-sm" href="#"style="width: 150px">
                                              <i class="fas fa-trash">
                                              </i>
                                              Delete
                                          </button>
                                      </form>

                                  </td>
                              </tr>

                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
        <!-- /.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->

@stop
