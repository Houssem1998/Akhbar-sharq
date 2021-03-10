<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg" dir="rtl">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ route('index',app()->getlocale()) }}"><img src="{{ asset('/front/img/core-img/logo.png') }}" alt="Logo" style="width:70%"></a>
                <!-- Navbar Toggler -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <!-- Navbar -->
                <div class="collapse navbar-collapse" id="worldNav">
                    <ul class="navbar-nav ml-auto" dir="rtl">

                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('index',app()->getlocale()) }}">الصفحة الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog.index',app()->getlocale()) }}">المدونة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('write.create',app()->getlocale()) }}">اكتب معنا </a>
                        </li>

                    </ul>
                    <!-- Search Form  -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown" style="text-align: left">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  <ion-icon name="globe-outline"> </ion-icon>  إعلام  <sub>{{App\Models\Notification::all()->count()}}</sub></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach(App\Models\Notification::all() as $notification)

                                @endforeach
                                <div style="margin-left: 5px;margin-right: 5px;">
                                    <h3>أخبار</h3>
                                    <p>أخبار حصرية من مصادر موثوقة على موقعنا نعلمكم بها يومياً</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div id="search-wrapper">
                        <form action="#">
                            <input type="text" id="search" placeholder="Search something...">
                            <div id="close-icon"></div>
                            <input class="d-none" type="submit" value="">
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
