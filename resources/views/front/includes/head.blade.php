<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Title  -->
<title>@yield('pageTitle')</title>

<!-- Favicon  -->
<link rel="icon" href="{{ asset('/front/img/core-img/favicon.ico') }}">

<!-- Style CSS -->
<link rel="stylesheet" href="{{ asset('/front/style.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('/admin/plugins/summernote/summernote-bs4.css') }}">
<script src="https://cdn.tiny.cloud/1/6octfffuvhyhzb3nnnirljcdooj9sq9b87p57m9zak34es4j/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

     <script>
        tinymce.init({
          selector: '#mytextarea',
          plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
          toolbar_mode: 'floating',
        });
      </script>
<style>
         .imgg {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 100%;
}
.icon {
  width: 20px;
}

.imgg:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
    div.gallery {
      margin: 5px;
      border: 1px solid #ccc;
      float: left;
      width: 180px;
    }

    div.gallery:hover {
      border: 1px solid #777;
    }

    div.gallery img {
      width: 100%;
      height: auto;
    }

    div.desc {
      padding: 15px;
      text-align: center;
    }
</style>
<style>
    .container {
      position: relative;
    }

    .image {
      display: block;
    }

    .overlay {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      height: 100%;
      width: 100%;
      opacity: 0;
      transition: .5s ease;
      background-color:silver;
    }

    .container:hover .overlay {
      opacity: 1;
    }

    .text {
      color: black;
      font-size: 20px;
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      text-align: center;
    }
    </style>
<style>
    #toast {
    visibility: hidden;
    max-width: 50px;
    height: 50px;
    /*margin-left: -125px;*/
    margin: auto;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;

    position: fixed;
    z-index: 1;
    left: 0;right:0;
    bottom: 30px;
    font-size: 17px;
    white-space: nowrap;
}
#toast #img{
	width: 50px;
	height: 50px;

    float: left;

    padding-top: 16px;
    padding-bottom: 16px;

    box-sizing: border-box;


    background-color: #111;
    color: #fff;
}
#toast #desc{


    color: #fff;

    padding: 16px;

    overflow: hidden;
	white-space: nowrap;
}

#toast.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes expand {
    from {min-width: 50px}
    to {min-width: 350px}
}

@keyframes expand {
    from {min-width: 50px}
    to {min-width: 350px}
}
@-webkit-keyframes stay {
    from {min-width: 350px}
    to {min-width: 350px}
}

@keyframes stay {
    from {min-width: 350px}
    to {min-width: 350px}
}
@-webkit-keyframes shrink {
    from {min-width: 350px;}
    to {min-width: 50px;}
}

@keyframes shrink {
    from {min-width: 350px;}
    to {min-width: 50px;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 60px; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 60px; opacity: 0;}
}
</style>
