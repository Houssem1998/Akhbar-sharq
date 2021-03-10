@extends('front.layouts.default')
@section('pageTitle', 'اكتب معنا')
@section('content')
<!-- ********** Hero Area Start ********** -->
<div class="hero-area height-400 bg-img background-overlay" style="background-image: url({{ asset('/front/img/blog-img/bg4.jpg') }});"></div>
<!-- ********** Hero Area End ********** -->

<section class="contact-area section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Contact Form Area -->
            <div class="col-12 col-md-10 col-lg-8" dir="rtl">

                <div class="contact-form">
                    <h5>صفحة اكتب معنا</h5>
                    <!-- Contact Form -->
                    <form method="POST" id="event-form" action="{{ route('write.store',app()->getlocale()) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="group">
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>الإسم و اللقب </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="group">
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>البريد الالكتروني</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="group">
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>عنوان المقال</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="group">
                                    <input type="text" name="subTitle" id="subTitle" value="{{ old('subTitle') }}" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>تعريف أو تلخيص للمقال</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>المجال</label>
                                    <select class="form-control select2" style="width: 100%;" name="category" id="category">
                                        @foreach(App\Models\Category::all() as $category)
                                            <option @if($category->name === old('category'))selected="selected"@endif value ="{{ $category->name }}" >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="group">
                                    <textarea id="mytextarea" name="body">{{ old('body') }}</textarea>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-group">
                                    <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="exampleInputFile" onchange="readURL(this);">
                                        <label class="custom-file-label" for="exampleInputFile">اختر صورة الغلاف</label>
                                    </div>
                                </div>
                             </div>
                             <div class="col-md-12">
                                <img id="blah" class="imgg" src="" alt=""/>
                             </div>
                            <div class="col-12">
                                <button type="submit" class="btn world-btn">أرسل المقال</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
