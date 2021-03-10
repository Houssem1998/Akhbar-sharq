@extends('dashboard.layouts.default')
@section('pageTitle', 'Admin Write With Us')
@section('content')

<div class="row">
    @foreach($posts as $post)
        <div class=" col-12 col-md-6">
            <div class="card">
                <div class="card-header ar" dir="rtl">
                    <p>
                      <b>{{ $post->title }}</b>
                    </p>
                </div>
                <div class="card-body ar" dir="rtl">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <img src="{{ $post->image }}" class="imgg" alt="">
                        </div>
                        <div class="col-12 col-md-6">
                            {{ $post->subTitle }}
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="ar">
                        <button class="btn btn-danger btn-sm col-4" href="#"style="width: 150px" data-toggle="modal" data-target="#delete-{{ $post->id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                        <a href="{{ route('write.show',[app()->getlocale(),$post->id]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
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
                  <form action="{{ route('write.destroy',[app()->getlocale(), $post->id]) }}" method="post">
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

@stop
