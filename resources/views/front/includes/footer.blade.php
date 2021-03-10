<div class="container">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="footer-single-widget">
                <ul class="footer-menu d-flex justify-content-between">
                    @foreach(App\Models\Category::all() as $cat)
                    <li><a href="{{ route('blog.index',app()->getlocale()) }}">{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="footer-single-widget">
                <h5>Subscribe</h5>
                <form action="#" method="post">
                    <input type="email" name="email" id="email" placeholder="Enter your mail">
                    <button type="button"><i class="fa fa-arrow-right"></i></button>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="footer-single-widget">
                <a href="#"><img src="{{ asset('/front/img/core-img/logo.png') }}" alt=""></a>
                <div class="copywrite-text mt-30">
                    <p>
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is developed <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://senro.online" target="_blank">SENRO</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
