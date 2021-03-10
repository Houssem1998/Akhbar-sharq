@extends('front.layouts.default')
@section('pageTitle', 'Post')
@section('content')

<!-- ********** Hero Area Start ********** -->
<div class="hero-area height-600 bg-img background-overlay" style="background-image: url('{{ str_replace(' ','',$post->image) }}');">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="single-blog-title text-center">
                    <!-- Catagory -->
                    <div class="post-cta"><a href="#">{{ $post->category }}</a></div>
                    <h3 dir="rtl">{{ $post->title }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ********** Hero Area End ********** -->

<div class="main-content-wrapper section-padding-100" style="text-align: right">
    <div class="container">
        <div class="row justify-content-center">
            <!-- ============= Post Content Area ============= -->
            <div class="col-12 col-lg-8">
                <div class="single-blog-content mb-100">
                    <!-- Post Meta -->
                    <div class="post-meta">
                        <div class="row">
                            <div class="col-md-11">
                                <p><a href="#" class="post-date">{{ $post->updated_at->format('Y/m/d H:m') }}</a> <a href="#" class="post-author"> {{ $post->writerName }}</a></p>
                            </div>
                            <div class="col-md-1">
                                <div id="avatar" style="background-image: url('{{ $post->writerImage }}')"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Post Content -->
                    <div class="post-content" dir="rtl">
                        {!! $post->body !!}
                    </div>
                </div>
            </div>

            @include('front.includes.sidebar')
        </div>
    </div>
</div>
@stop
