<!-- ========== Sidebar Area ========== -->
<div class="col-12 col-md-8 col-lg-4">
    <div class="post-sidebar-area">
        <!-- Widget Area -->
        @foreach(App\Models\Field::where('section','about')->get() as $about)
            <div class="sidebar-widget-area">
                <h5 class="title">{{ $about->title }}</h5>
                <div class="widget-content">
                    <p>{{ $about->body }}</p>
                </div>
            </div>
        @endforeach


        <!-- Widget Area -->
        <div class="sidebar-widget-area">
            <h5 class="title">عاجل</h5>
            <div class="widget-content" >
                @foreach(App\Models\Post::where('urgent',1)->orderBy('created_at','desc')->take(4)->get() as $post)
                    <!-- Single Blog Post -->
                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="{{ $post->image }}" alt="">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href=" {{  route('blog.show',[app()->getlocale(),$post->id])  }} " class="headline">
                                <h5 class="mb-0">{{ $post->title }}</h5>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Widget Area -->
        <div class="sidebar-widget-area">
            <h5 class="title">ابق متصلاً</h5>
            <div class="widget-content">
                <div class="social-area d-flex justify-content-between">
                    @foreach(App\Models\Field::where('section','link')->get() as $link)
                    @switch($link->title)
                    @case("Facebook")
                        <a href="{{ $link->body }}">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        @break

                    @case("Twitter")
                        <a href="{{ $link->body }}">
                            <i class="fa fa-twitter"></i>
                        </a>
                        @break
                    @case("Youtube")
                        <a href="{{ $link->body }}">
                            <i class="fa fa-youtube-play"></i>
                        </a>
                        @break
                    @case("Instagram")
                        <a href="{{ $link->body }}">
                            <i class="fa fa-instagram"></i>
                        </a>
                        @break

                    @default
                        <p>no link found</p>
                @endswitch
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============= Post Content Area Start ============= -->
