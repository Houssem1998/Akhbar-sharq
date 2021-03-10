@extends('front.layouts.default')
@section('pageTitle', 'المدونة')
@section('content')

<!-- ********** Hero Area Start ********** -->
<div class="hero-area height-400 bg-img background-overlay" style="background-image: url({{ asset('/front/img/blog-img/bg5.jpg') }});"></div>
<!-- ********** Hero Area End ********** -->

<div class="main-content-wrapper section-padding-100">
    <div class="container">

        <div class="row" >
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($categories->reverse() as $category)
                    <li class="nav-item">
                        <a class="nav-link" id="tab{{str_replace(' ', '-', $category->name)}}" data-toggle="tab" href="#world-tab-{{str_replace(' ', '-', $category->name)}}" role="tab" aria-controls="world-tab-{{str_replace(' ', '-', $category->name)}}" aria-selected="false">{{ $category->name }}</a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link active" id="taball" data-toggle="tab" href="#world-tab-all" role="tab" aria-controls="world-tab-" aria-selected="true">*.*</a>
                </li>
                <li class="title" style="text-align: right">&nbsp;&nbsp;&nbsp;&nbsp;أقسام</li>
            </ul>
        </div>
        <div class="row" style="text-align: right">
            <div class="col-12 col-lg-8" >
                <div class="post-content-area">
                    <!-- Catagory Area -->
                    <div class="world-catagory-area">
                        <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="world-tab-all" role="tabpanel" aria-labelledby="taball">
                                    @foreach(App\Models\WriteWithUs::where('status',1)->orderBy('updated_at','desc')->get() as $postblog)
                                        <!-- Single Blog Post -->
                                        <div class="single-blog-post post-style-4 d-flex align-items-center">

                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="{{ route('blog.show',[app()->getlocale(),$postblog->id]) }}" class="headline">
                                                    <h5>{{ $postblog->title }}</h5>
                                                </a>
                                                <p>{{ $postblog->subTitle }}</p>
                                                <!-- Post Meta -->
                                                <div class="post-meta">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p><a href="#" class="post-date">{{ $postblog->updated_at->format('Y/m/d H:m') }}</a> <a href="#" class="post-author"> {{ $postblog->writerName }}</a></p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div id="avatar" style="background-image: url('{{ $postblog->writerImage }}')"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <img src="{{ $postblog->image }}" alt="">
                                            </div>
                                        </div>
                                    @endforeach
                                    @foreach(App\Models\Post::where('status',1)->orderBy('updated_at','desc')->get() as $postblog)
                                        <!-- Single Blog Post -->
                                        <div class="single-blog-post post-style-4 d-flex align-items-center">

                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="{{ route('blog.show',[app()->getlocale(),$postblog->id]) }}" class="headline">
                                                    <h5>{{ $postblog->title }}</h5>
                                                </a>
                                                <p>{{ $postblog->subTitle }}</p>
                                                <!-- Post Meta -->
                                                <div class="post-meta">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p><a href="#" class="post-date">{{ $postblog->updated_at->format('Y/m/d H:m') }}</a> <a href="#" class="post-author"> {{ $postblog->writerName }}</a></p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div id="avatar" style="background-image: url('{{ $postblog->writerImage }}')"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <img src="{{ $postblog->image }}" alt="">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @foreach($posts as $post)
                                <div class="tab-pane fade " id="world-tab-{{str_replace(' ', '-', $post->category)}}" role="tabpanel" aria-labelledby="tab{{str_replace(' ', '-', $post->category)}}">
                                    @foreach(App\Models\WriteWithUs::where('category',$post->category)->orderBy('created_at','desc')->get() as $postblog)
                                    @if($postblog->status === 1)
                                        <!-- Single Blog Post -->
                                        <div class="single-blog-post post-style-4 d-flex align-items-center">

                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="{{ route('blog.show',[app()->getlocale(),$postblog->id]) }}" class="headline">
                                                    <h5>{{ $postblog->title }}</h5>
                                                </a>
                                                <p>{{ $postblog->subTitle }}</p>
                                                <!-- Post Meta -->
                                                <div class="post-meta">
                                                    <p><a href="#" class="post-author">{{ $postblog->writerName }}</a> on <a href="#" class="post-date">{{ $postblog->updated_at->format('Y/m/d H:m') }}</a></p>
                                                </div>
                                            </div>
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <img src="{{ $postblog->image }}" alt="">
                                            </div>
                                        </div>
                                    @endif
                                    @endforeach
                                    @foreach(App\Models\Post::where('category',$post->category)->orderBy('created_at','desc')->get() as $postblog)
                                    @if($postblog->status === 1)
                                        <!-- Single Blog Post -->
                                        <div class="single-blog-post post-style-4 d-flex align-items-center">

                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="{{ route('blog.show',[app()->getlocale(),$postblog->id]) }}" class="headline">
                                                    <h5>{{ $postblog->title }}</h5>
                                                </a>
                                                <p>{{ $postblog->subTitle }}</p>
                                                <!-- Post Meta -->
                                                <div class="post-meta">
                                                    <p><a href="#" class="post-author">{{ $postblog->writerName }}</a> on <a href="#" class="post-date">{{ $postblog->updated_at->format('Y/m/d H:m') }}</a></p>
                                                </div>
                                            </div>
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <img src="{{ $postblog->image }}" alt="">
                                            </div>
                                        </div>
                                    @endif
                                    @endforeach
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            @include('front.includes.sidebar')
        </div>
    </div>
</div>

@stop
