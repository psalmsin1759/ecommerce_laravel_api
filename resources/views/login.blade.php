
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="NoDM no dm nodirectmessage" />
        <meta name="keywords" content="NoDM no dm nodirectmessage" />
        <meta name="author" content="QNetix technologies" />
        <meta name="email" content="info@nodirectmessage.com" />
        <meta name="website" content="https://nodirectmessage.com" />
        <meta name="Version" content="v3.8.0" />
        <!-- favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset("/dashboardassets/images/favicon/apple-touch-icon.png")}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset("/dashboardassets/images/favicon/favicon-32x32.png")}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset("/dashboardassets/images/favicon/favicon-16x16.png")}}">
        <link rel="manifest" href="{{asset("/dashboardassets/images/favicon/site.webmanifest")}}">
        <link rel="mask-icon" href="{{asset("/dashboardassets/images/favicon/safari-pinned-tab.svg")}}" color="#4566D8">
        <meta name="msapplication-TileColor" content="#4566D8">
        <meta name="theme-color" content="#ffffff">
        
        <!-- Bootstrap -->
        <link href="{{asset("dashboardassets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="{{asset("dashboardassets/css/materialdesignicons.min.css")}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
        <!-- Main Css -->
        <link href="{{asset("dashboardassets/css/style.css")}}" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="{{asset("dashboardassets/css/colors/default.css")}}" rel="stylesheet" id="color-opt">

    </head>

    <body>
        <!-- Loader -->
        <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
        <!-- Loader -->
        
        <section class="bg-home d-flex align-items-center position-relative" style="background: url('dashboardassets/images/shape01.png') center;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-signin p-4 bg-white rounded shadow">
                            @include('flash-message')
                            <form method="POST"  action="{{url("/login")}}">
                                {{ csrf_field() }}
                                <a href="{{url("/")}}"><img src="{{asset("dashboardassets/images/nodmlogo.png")}}" class="avatar avatar-small mb-4 d-block mx-auto" alt=""></a>
                                <h5 class="mb-3 text-center">Please sign in</h5>
                            
                                <div class="form-floating mb-2">
                                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                                    <label for="floatingPassword">Password</label>
                                </div>

                                
                                <div class="d-flex justify-content-between">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                        </div>
                                    </div>
                                    <p class="forgot-pass mb-0"><a href="{{url("/forgotpassword")}}" class="text-dark small fw-bold">Forgot password ?</a></p>
                                </div>
                
                                <button class="btn btn-primary w-100" type="submit">Sign in</button>

                                <div class="col-12 text-center mt-3">
                                </div><!--end col-->

                                <p class="mb-0 text-muted mt-3 text-center">copyright © <script>document.write(new Date().getFullYear())</script>  All Right Reserved</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       

        <!-- javascript -->
        <script src="{{asset("dashboardassets/js/bootstrap.bundle.min.js")}}"></script>
        <!-- Icons -->
        <script src="{{asset("dashboardassets/js/feather.min.js")}}"></script>
        <!-- Switcher -->
        <script src="{{asset("dashboardassets/js/switcher.js")}}"></script>
        <!-- Main Js -->
        <script src="{{asset("dashboardassets/js/plugins.init.js")}}"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="{{asset("dashboardassets/js/app.js")}}"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->        
    </body>

</html>