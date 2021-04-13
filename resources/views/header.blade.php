<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title> | Admin Panel</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets') }}/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets') }}/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets') }}/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets') }}/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets') }}/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets') }}/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets') }}/css/custom.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ asset('assets') }}/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('assets') }}/js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/js/core/app.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/js/core/libraries/jquery_ui/datepicker.min.js"></script>
	<!-- /theme JS files -->

</head>

<style type="text/css">
	.heading-elements .btn {
		margin-bottom: 20px;
	}
	.switchery-sm.checkbox-switchery .switchery {
		margin-top: -8px;
	}
	.card_image {
		max-height: 15vh;
    	max-width: 50px;
    	border: 1px solid #ccc;
    	border-radius: 12px;
	}
	.user_image {
		width: 100px;
		height: 100px;
	}
</style>

<body>
	<div class="loader hidden">
		<i class="icon-spinner6 spinner"></i>
	</div>
	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ route('home') }}">Admin</a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="">Logout</a>
				</li>
			</ul>
		</div>

	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			@include('sidebar')

			
			            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="page-title">
                            <h4>
                                <span class="text-semibold">Admin</span> - {{ !empty(Request::segment(1)) ? ucwords(str_replace('_',' ',Request::segment(1))) : 'Dashboard' }}
                            </h4>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}"><i class="icon-home2 position-left"></i> Admin</a></li>
                            <li class="active">
                                {{ !empty(Request::segment(1)) ? ucwords(str_replace('_',' ',Request::segment(1))) : 'Dashboard' }}
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


<!-- Content area -->
<div class="content">

    <!-- Main charts -->
    <div class="row">
        <div class="col-lg-12">