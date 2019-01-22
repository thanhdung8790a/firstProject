<!DOCTYPE html>
<html lang="en">
<head>
<title>CMD</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/fullcalendar.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/colorpicker.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/datepicker.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/select2.css') }}" />
<!-- <link rel="stylesheet" href="{{ asset('css/backend_css/sweetalert.css') }}" /> -->
<link rel="stylesheet" href="{{ asset('css/backend_css/sweetalert.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/matrix-media.css') }}" />
<link href="{{ asset('fonts/backend_fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/backend_css/jquery.gritter.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>

<!--Header-->
@include('layouts.adminLayout.admin_header')
<!--close-Header-->
<!--sidebar-menu-->
@include('layouts.adminLayout.admin_sidebar')
<!--sidebar-menu-->

<!--main-container-part-->

 @yield('content')

<!--end-main-container-part-->

<!--Footer-part-->

@include('layouts.adminLayout.admin_footer');

<!--end-Footer-part-->

<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.ui.custom.js') }}"></script> 
<script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/bootstrap-colorpicker.js') }}"></script> 
<!-- <script src="{{ asset('js/backend_js/bootstrap-datepicker.js') }}"></script>  -->
<!-- <script src="{{ asset('js/backend_js/masked.js') }}"></script> --> 
<script src="{{ asset('js/backend_js/jquery.uniform.js') }}"></script> 
<script src="{{ asset('js/backend_js/select2.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/matrix.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.validate.js') }}"></script>
<script src="{{ asset('js/backend_js/matrix.form_validation.js') }}"></script>
<!-- <script src="{{ asset('js/backend_js/jquery.peity.min.js') }}"></script> -->
<script src="{{ asset('js/backend_js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('js/backend_js/tinyMCE.custom.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/backend_js/matrix.tables.js') }}"></script>
<!-- <script src="{{ asset('js/backend_js/sweetalert.min.js') }}"></script>  -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.js"></script> -->

<script type="text/javascript">
	tinyMCE.init({
	    selector:'textarea',
	    height:350,
	    width:1000,
	    theme: 'modern',
	    plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
	    toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
	    image_advtab: true,
	    content_css: [
	        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
	        '//www.tinymce.com/css/codepen.min.css'
	    ]
	});
</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->

</body>
</html>
