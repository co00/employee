<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href=" {{ asset('assets') }}/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets') }}/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets') }}/css/minified/core.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets') }}/css/minified/components.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets') }}/css/minified/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('assets') }}/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->


    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets') }}/js/core/app.js"></script>
    <!-- /theme JS files -->

</head>

<body>

    <!-- Page container -->
    <div class="page-container login-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">

                    <!-- Simple login form -->
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                                <h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
                            </div>

                            <!-- <?php if( !empty($_SESSION['error']) ): ?>
                                <div class="alert alert-danger">
                                    <?=$_SESSION['error']?>
                                </div>
                            <?php endif; ?> -->

                            <div class="form-group has-feedback has-feedback-left">
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" value="admin@argon.com" required autofocus>


                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                                
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" value="secret" required>
                                
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                                
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
                            </div>
                        </div>
                    </form>
                    <!-- /simple login form -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

</body>
</html>
