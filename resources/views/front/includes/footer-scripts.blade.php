<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{ asset('/front/js/jquery/jquery-2.2.4.min.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('/front/js/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('/front/js/bootstrap.min.js') }}"></script>
<!-- Plugins js -->
<script src="{{ asset('/front/js/plugins.js') }}"></script>
<!-- Active js -->
<script src="{{ asset('/front/js/active.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
<script>
    function launch_toast() {
    var x = document.getElementById("toast")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
}
</script>

<script>
    function readURL(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();

               reader.onload = function (e) {
                   $('#blah')
                       .attr('src', e.target.result);
               };

               reader.readAsDataURL(input.files[0]);
           }
       }
</script>
