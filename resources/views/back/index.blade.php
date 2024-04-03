<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin2 </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('back/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('back/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('back/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('back/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('back/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('back/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('back/js/select.dataTables.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('back/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('back/images/favicon.png')}}" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <script src="{{asset('/js/jquery-3.6.0.min.js')}}"></script>
     <!-- dependencies (Summernote depends on Bootstrap & jQuery) -->
    <!-- include libraries(jQuery, bootstrap) -->
    <!-- include libraries(jQuery, bootstrap) -->
    <!-- include libraries(jQuery, bootstrap) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- include libraries(jQuery, bootstrap) -->
</head>
<style>
@font-face {
    font-family: 'yekan';
    src: url('/fonts/yekan.ttf') format('truetype'),
        url('/fonts/yekan.eot?#iefix') format('embedded-opentype');
}
</style>

<body style="direction: rtl;text-align: right;font-family: yekan;">
    <div class="container-scroller">
        @include('back.b_pro_baner')
        <!-- partial:partials/_navbar.html -->
        @include('back.nav_top')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            @include('back.theme_settings_wrapper')
            @include('back.side_bar_right')
            @include('back.nav')
            @yield('content')
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{asset('back/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('back/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('back/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('back/vendors/progressbar.js/progressbar.min.js')}}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('back/js/off-canvas.js')}}"></script>
    <script src="{{asset('back/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('back/js/template.js')}}"></script>
    <script src="{{asset('back/js/settings.js')}}"></script>
    <script src="{{asset('back/js/todolist.js')}}"></script>


    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('back/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <script src="{{asset('back/js/dashboard.js')}}"></script>
    <script src="{{asset('back/js/Chart.roundedBarCharts.js')}}"></script>
    <!-- End custom js for this page-->
</body>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js">
    </script>
<script>
$(document).ready(function() {

    // Define function to open filemanager window
    var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix :
            '/laravel-filemanager';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager',
            'width=900,height=600');
        window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="note-icon-picture"></i> ',
            tooltip: 'Insert image with filemanager',
            click: function() {

                lfm({
                    type: 'image',
                    prefix: '/laravel-filemanager'
                }, function(lfmItems, path) {
                    lfmItems.forEach(function(lfmItem) {
                        context.invoke('insertImage', lfmItem
                            .url);
                    });
                });

            }
        });
        return button.render();
    };

    // Initialize summernote with LFM button in the popover button group
    // Please note that you can add this button to any other button group you'd like
    $('#summernote').summernote({
        height: 300,
        toolbar: [
            ['popovers', ['lfm']],
            ['style', ['style']],
            ['style', ['bold', 'italic', 'underline', 'strikethrough',
                'superscript', 'subscript', 'clear'
            ]],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video', 'hr', 'readmore']],
            ['genixcms', ['elfinder']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ],
        buttons: {
            lfm: LFMButton
        }
    });
});
$('#lfm').filemanager('image');

</script>


</html>