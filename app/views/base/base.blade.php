<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @section('head.title')
        @show
        | Lamosty's Laravel Blog
    </title>

    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="wrapper">
        <header>
            @include('partials.nav')
        </header>

        <div class="container" id="blog-main">
            <div class="row">
                <main class="col-sm-8">
                    @yield('main-content')
                </main><!-- /.blog-main -->

                <aside id="sidebar" class="col-sm-3 col-sm-offset-1 blog-sidebar">
                    @include('partials.sidebar')
                </aside><!-- /.blog-sidebar -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>

    @include('partials.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>
