@extends('dashboard.layouts.default')
@section('pageTitle', 'All posts')
@section('content')
<div class="row">
<div class="col-md-12">
     <a href="{{ route('post.create',app()->getlocale()) }}">
        <button class="btn btn-primary col-md-12"> Add Post +</button>
    </a>
</div>
</div>
<div class="row">
    @can('manage-users')
        <div class="col-md-12">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            ID
                        </th>
                        <th style="width: 20%">
                            Writer Name
                        </th>
                        <th style="width: 30%">
                            Avatar
                        </th>
                        <th style="width: 30%">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($writers as $writer)
                        <tr>
                            <td>
                                {{ $writer->id }}
                            </td>
                            <td>
                                {{ $writer->writerName }}
                            </td>
                            <td>
                                <img alt="Avatar" class="table-avatar" src="{{ $writer->writerImage }}">
                            </td>
                            <td>
                                <div class="text-right">
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-danger btn-sm col-4" href="#"style="width: 150px" data-toggle="modal" data-target="#delete-{{ $writer->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="delete-{{ $writer->id }}">
                                    <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title">Delete writer {{ $writer->writerName }}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <p>Are you sure you want to delete Writer</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <form action="{{ route('writer.destroy',[app()->getlocale(), $writer->id]) }}" method="post">
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
    @endcan
</div>
<div class="row">
        @foreach($posts as $post)
            <div class="col-12 col-sm-2 col-md-4 d-flex align-items-stretch">
                <div class="card bg-light">
                    <div class="card-header text-muted border-bottom-0">
                        {{ $post->writerName }}
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>{{ $post->title}}</b></h2>
                                <p class="text-muted text-sm"><b>Category: </b> {{ $post->category }} </p>
                                <p class="text-muted small"><b>Writer Email</b> : {{ $post->writerEmail }}</p>
                                @if(isset($post->resource))
                                    <p class="text-muted small"><b>Resource</b> : {{ $post->resource }}</p>
                                @endif
                            </div>
                            <div class="col-5 text-center">
                                <img src="{{ $post->writerImage }}" alt="" class="img-circle img-fluid">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <ul class="ml-4 mb-0 fa-ul text-muted ">
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-time"></i></span> Created At : {{ $post->created_at->format('Y/m/d H:i') }}</li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-time"></i></span> Updated At : {{ $post->updated_at->format('Y/m/d H:i') }}</li>
                                    @if(isset($post->wroted_at))
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-time"></i></span> Wroted At : {{ $post->wroted_at}}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                                <p class="small text-muted">
                                    @if($post->status === 1)
                                        Published
                                    @elseif($post->status === 0)
                                        Hidden
                                    @endif
                                </p>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-danger btn-sm col-4" href="#"style="width: 150px" data-toggle="modal" data-target="#delete-{{ $post->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <a href="{{ route('post.edit',[app()->getlocale(), $post->id])}}" class="btn btn-warning"><i class="fas fa-tools"></i></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="delete-{{ $post->id }}">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete {{ $post->title }}</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure you want to delete post</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <form action="{{ route('post.destroy',[app()->getlocale(), $post->id]) }}" method="post">
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

                </tbody>
            </table>
        </div>

@stop
