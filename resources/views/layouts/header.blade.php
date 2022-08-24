<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>



	<!-- Meta data -->

	<meta charset="UTF-8">

	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>

	<meta content="CRM - Createics Information Technology" name="description">

	<meta content="Spruko Private Limited" name="author">

	<meta name="keywords" content="admin, admin template, dashboard, admin dashboard, responsive, bootstrap, bootstrap 5, admin theme, admin themes, bootstrap admin template, scss, ui, crm, modern, flat">

	<!-- CSRF Token -->

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Title -->

	<title>Cosmoj's CRM</title>



	<script type="text/javascript">
		const public_url = "{{asset('public')}}";

		const main_url = "{{url('admin')}}";

		const site_url = "{{url('')}}";

		const current_user = "{{Auth::user()->id}}";
	</script>



	<!-- CK Editor -->

	<script src="{{asset('public')}}/assets/ckeditor/ckeditor.js" type="text/javascript">



	</script>







	<!--Favicon -->

	<link rel="icon" href="{{asset('public')}}/assets/images/cosmojlogo.png" type="image/x-icon" />

	<link href="{{asset('public')}}/assets/plugins/dist_file_upload/imageuploadify.min.css" rel="stylesheet">

	<!--Bootstrap css -->

	<link id="style" href="{{asset('public')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- owl.carousel css -->

	<link href="{{asset('public')}}/assets/plugins/owlcarousel/owl.carousel.css" rel="stylesheet" />



	<!-- Style css -->

	<link href="{{asset('public')}}/assets/css/style.css" rel="stylesheet" />

	<link href="{{asset('public')}}/assets/css/dark.css" rel="stylesheet" />

	<link href="{{asset('public')}}/assets/css/skin-modes.css" rel="stylesheet" />



	<!-- Animate css -->

	<link href="{{asset('public')}}/assets/css/animated.css" rel="stylesheet" />



	<!-- P-scroll bar css-->

	<link href="{{asset('public')}}/assets/plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />



	<!---Icons css-->

	<link href="{{asset('public')}}/assets/css/icons.css" rel="stylesheet" />



	<!-- Simplebar css -->

	<link rel="stylesheet" href="{{asset('public')}}/assets/plugins/simplebar/css/simplebar.css">



	<!-- INTERNAL Morris Charts css -->

	<link href="{{asset('public')}}/assets/plugins/morris/morris.css" rel="stylesheet" />



	<!-- INTERNAL Select2 css -->

	<link href="{{asset('public')}}/assets/plugins/select2/select2.min.css" rel="stylesheet" />







	<!-- Data table css -->

	<!-- <link href="{{asset('public')}}/assets/plugins/datatables/DataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet" />

		<link href="{{asset('public')}}/assets/plugins/datatables/Responsive/css/responsive.bootstrap4.min.css" rel="stylesheet" /> -->



	<link href="{{asset('public')}}/assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css" rel="stylesheet" />

	<link href="{{asset('public')}}/assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css" rel="stylesheet">

	<link href="{{asset('public')}}/assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css" rel="stylesheet" />





	<!-- INTERNAL File Uploads css -->

	<link href="{{asset('public')}}/assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />

	<!-- <link rel="stylesheet" type="text/css" href="{{asset('public')}}/assets/plugins/DataTables12/datatables.css"> -->

	<!-- INTERNAL File Uploads css-->

	<link href="{{asset('public')}}/assets/plugins/fileupload/css/fileupload.css" rel="stylesheet" type="text/css" />







	<!-- Color Skin css -->

	<link id="theme" href="{{asset('public')}}/assets/colors/color1.css" rel="stylesheet" type="text/css" />



	<!-- <link href="{{asset('public')}}/assets/plugins/date-picker/date-picker.css" rel="stylesheet"> -->



	<link href="{{asset('public')}}/assets/plugins/sweet-alert/jquery.sweet-modal.min.css" rel="stylesheet">

	<link href="{{asset('public')}}/assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet">

	<!-- <link href="{{asset('public')}}/assets/toggle/css/bootstrap2-toggle.css" rel="stylesheet">

		<link href="{{asset('public')}}/assets/toggle/css/bootstrap2-toggle.min.css" rel="stylesheet">

		<link href="{{asset('public')}}/assets/toggle/css/bootstrap-toggle.css" rel="stylesheet">

		<link href="{{asset('public')}}/assets/toggle/css/bootstrap-toggle.min.css" rel="stylesheet"> -->

	<!-- Jquery js-->

	<!-- <link rel="stylesheet" href="{{asset('public')}}/assets/css/jquery.dataTables.min.css"> -->



	<script src="{{asset('public')}}/assets/js/jquery.min.js"></script>

	<style type="text/css">



	</style>

</head>



<body class="app sidebar-mini">

	<div id="app">

		<!---Global-loader-->

		<div id="global-loader">

			<img src="{{asset('public')}}/assets/images/svgs/loader.svg" alt="loader">

		</div>

		<!--- End Global-loader-->



		<!-- Page -->

		<div class="page">

			<div class="page-main">