@extends('front.layouts.default')
@section('pageTitle', 'الصفحة الرئيسية')
@section('content')

 <!-- ********** Hero Area Start ********** -->
 <div class="hero-area"  >

    <!-- Hero Slides Area -->
    <div class="hero-slides owl-carousel" >


        @foreach(App\Models\Field::where('section','slideshow')->get() as $slideshow)
            <!-- Single Slide -->
            <div class="single-hero-slide bg-img background-overlay" style="background-image: url({{ $slideshow->image }}); size: 100%;"></div>
        @endforeach
    </div>
    <!-- Hero Post Slide -->
    <div class="hero-post-area ar">
        <div class="containerr">
            <div class="row">
                <div class="col-md-6" style="margin-left: 10px">

                    <div class="row">
                        <div class="col-md-7">
                            <div class="world-hero-slider owl-carousel wow fadeInUpBig" data-wow-delay="0.1s" >
                                @foreach(App\Models\Post::where('urgent',1)->orderBy('created_at','desc')->take(4)->get() as $post)
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post" style="">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <div class="container">
                                                <img src="{{ $post->image }}" alt="" class="image">
                                                <div class="overlay">
                                                    <div class="text">
                                                        <a href="{{ route('blog.show',[app()->getlocale(),$post->id]) }}" class="headline">
                                                            {{ $post->title }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Catagory -->
                                            <div class="post-cta2"><a href="#">{{ $post->category }}</a></div>
                                            <div class="post-cta3" style="height: 20px">
                                                <h5 class="title" style="background-color:rgba(255, 70, 70, 0.897); text-align:right;">عاجل</h5>
                                            </div>


                                        </div>
                                        <!-- Post Content -->


                                    </div>

                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-12 hero-text">
                            @foreach(App\Models\Field::where('section','coverText')->get() as $coverText)
                                <div style="color: silver"><b>{{ $coverText->title }}</b></div>
                            @endforeach

                        </div>
                        <div class="col-lg-12 hero-post-area-notification">

                            <div class="row">
                                @foreach(App\Models\Post::take(2)->orderBy('updated_at','desc')->get() as $post)
                                <div class="col-lg-6 ar ">
                                    <a href="{{ route('blog.show',[app()->getlocale(),$post->id]) }}">
                                        <div class="card card-body">
                                            <p class="hero-area-link" >{{ $post->title }}</p>
                                        </div >
                                    </a>
                                </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ********** Hero Area End ********** -->
<div class="main-content-wrapper section-padding-100">
    <div class="container">
        <div class="row">
            <!-- ============= Post Content Area Start ============= -->
            <div class="col-12 col-lg-8">
                <div class="post-content-area mb-50">

                    <!-- Catagory Area -->
                    <div class="world-catagory-area" >

                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="taball" data-toggle="tab" href="#world-tab-all" role="tab" aria-controls="world-tab-" aria-selected="true" style="visibility: hidden">All</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="world-tab-1" role="tabpanel" aria-labelledby="tab1">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="world-catagory-slider owl-carousel wow fadeInUpBig" data-wow-delay="0.1s">
                                            @foreach(App\Models\Post::take(3)->orderBy('updated_at','desc')->get() as $post)
                                                <!-- Single Blog Post -->
                                                <div class="single-blog-post">
                                                    <!-- Post Thumbnail -->
                                                    <div class="post-thumbnail">
                                                        <img src="{{ $post->image }}" alt="">
                                                        <!-- Catagory -->
                                                        <div class="post-cta"><a href="#">{{ $post->category }}</a></div>
                                                    </div>
                                                    <!-- Post Content -->
                                                    <div class="post-content">
                                                        <a href="{{ route('blog.show',[app()->getlocale(),$post->id]) }}" class="headline">
                                                            <h5>{{ $post->title }}</h5>
                                                        </a>
                                                        <p>{{ $post->subTitle }}</p>
                                                        <!-- Post Meta -->
                                                        <div class="post-meta">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <p><a href="#" class="post-date">{{ $post->updated_at->format('Y/m/d H:m') }}</a> <a href="#" class="post-author"> {{ $post->writerName }}</a></p>
                                                                </div>
                                                                <div class="col-md-1" style="text-align: right">
                                                                    <div id="avatar" style="background-image: url('{{ $post->writerImage }}')"></div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6" dir="rtl">
                                        @foreach(App\Models\Post::skip(3)->take(5)->orderBy('updated_at','desc')->get() as $post)
                                            <!-- Single Blog Post -->
                                            <div class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.5s">
                                                <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <img src="{{ $post->image }}" alt="">
                                                </div>
                                                <!-- Post Content -->
                                                <div class="post-content">
                                                    <a href="{{ route('blog.show',[app()->getlocale(),$post->id]) }}" class="headline">
                                                        <h5>{{ $post->title }}</h5>
                                                    </a>
                                                    <!-- Post Meta -->
                                                    <div class="post-meta">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <p><a href="#" class="post-date">{{ $post->updated_at->format('Y/m/d H:m') }}</a> <a href="#" class="post-author"> {{ $post->writerName }}</a></p>
                                                            </div>
                                                            <div class="col-md-1" style="text-align: right">
                                                                <div id="avatar" style="background-image: url('{{ $post->writerImage }}')"></div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @foreach(App\Models\WriteWithUs::take(3)->orderBy('updated_at','desc')->get() as $post)
                                            <!-- Single Blog Post -->
                                            <div class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.5s">
                                                <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <img src="{{ $post->image }}" alt="">
                                                </div>
                                                <!-- Post Content -->
                                                <div class="post-content">

                                                    <a href="{{ route('post.show',[app()->getlocale(),$post->id]) }}" class="headline">
                                                        <h5>{{ $post->title }}</h5>
                                                    </a>
                                                    <!-- Post Meta -->
                                                    <div class="post-meta">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <p><a href="#" class="post-date">{{ $post->updated_at->format('Y/m/d H:m') }}</a> <a href="#" class="post-author"> {{ $post->writerName }}</a></p>
                                                            </div>
                                                            <div class="col-md-1" style="text-align: right">
                                                                <div id="avatar" style="background-image: url('{{ $post->writerImage }}')"></div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('front.includes.sidebar')
        </div>
    </div>
    @include('front.includes.footerloader')
    </div>
</div>

@stop
