<!DOCTYPE html>
<html>
  <head>
    <title>
        @section('title')
        @show{{-- 页面标题 --}}
    </title>
    @section('style')
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