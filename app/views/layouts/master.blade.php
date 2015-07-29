<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Proton - Admin Template</title>

		<!-- Import google fonts - Heading first/ text second -->
        <link rel='stylesheet' type='text/css' href='http://fonts.useso.com/css?family=Open+Sans:400,700|Droid+Sans:400,700' />
        <!--[if lt IE 9]>
            <link href="http://fonts.useso.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
            <link href="http://fonts.useso.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
            <link href="http://fonts.useso.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
            <link href="http://fonts.useso.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
        <![endif]-->
    <title>
        @section('title')
        @show{{-- 页面标题 --}}
    </title>
    @section('style')
	    <!-- Css files -->

        <link href="/css/main.css"type="text/css" rel="stylesheet"/>
    @show

  </head>
  <body class="body" >
     @include('layouts.head')
     @include('layouts.left')

     <div class="main">
        <div class="col-xs-12 ">
            @yield('container')
        </div>
     </div>
     @include('layouts.footer')
    @section('script')
            <script src="/js/angular-0.10.0.min.js" ></script>
    @show
  </body>
</html>