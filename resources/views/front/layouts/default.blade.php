<!DOCTYPE html>
<html  lang="ar">

    <head>
        @include('front.includes.head')
    </head>

    <body>
        <!-- Preloader Start -->
        <div id="preloader">
            @include('front.includes.preloader')
        </div>
        <!-- Preloader End -->
        <!-- ***** Header Area Start ***** -->
        <header class="header-area">
            @include('front.includes.header')
        </header>
        <!-- ***** Header Area End ***** -->
            @yield('content')


        <!-- ***** Footer Area Start ***** -->
        <footer class="footer-area">
            @include('front.includes.footer')
        </footer>
        <!-- ***** Footer Area End ***** -->

        @include('front.includes.footer-scripts')

    </body>
</html>
