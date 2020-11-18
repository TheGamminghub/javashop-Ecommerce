<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>
    
    <!-- Bootstrap core CSS -->
    {{ Html::style('vendor/bootstrap/css/bootstrap.min.css') }}
    {{ Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}
        <!-- Custom styles for this template -->
    {{ Html::style('css/heroic-features.css') }}
   
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('style')

    
</head>

<body>

@include('front.layouts.nav')



<!-- Page Content -->
<div class="container">

    @yield('content')

<!-- footer -->
    <!-- @include('front.layouts.footer') -->



</div>
<!-- /.container -->


<!-- Bootstrap core JavaScript -->


{{ Html::script('vendor/jquery/jquery.min.js') }}
{{ Html::script('vendor/bootstrap/js/bootstrap.bundle.min.js') }}

@yield('script')

</body>

</html>
