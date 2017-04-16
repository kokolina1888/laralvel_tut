<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, maximum-scale=1">
  <title>Unique</title>
  <link rel="icon" href="{{asset('/assets/favicon.png')}}" type="image/png">
  <link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet" type="text/css"> 
  <link href="{{asset('/assets/css/font-awesome.css')}}" rel="stylesheet" type="text/css"> 
  <link href="{{asset('/assets/css/css/animate.css')}}" rel="stylesheet" type="text/css">

<!--[if lt IE 9]>
    <script src="js/respond-1.1.0.min.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/html5element.js"></script>
    <![endif]-->

  </head>
  <body>

    <!--Header_section-->
    <header id="header_wrapper">
      @yield('header')
    </header>
    <!--Header_section--> 

    <!--Hero_Section-->
   
     @yield('content')
   
  </div>
  <div class="container">
    <div class="footer_bottom"><span>Copyright © 2014,    Template by <a href="http://webthemez.com">WebThemez.com</a>. </span> </div>
  </div>
</footer>

<script type="text/javascript" src="{{url('/assets/js/jquery-1.11.0.min.js')}}"></script>
<script type="text/javascript" src="{{url('/assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('/assets/js/jquery-scrolltofixed.js')}}"></script>
<script type="text/javascript" src="{{url('/assets/js/jquery.nav.js')}}"></script> 
<script type="text/javascript" src="{{url('/assets/js/jquery.easing.1.3.js')}}"></script>
<script type="text/javascript" src="{{url('/assets/js/jquery.isotope.js')}}"></script>
<script type="text/javascript" src="{{url('/assets/js/wow.js')}}"></script> 
<script type="text/javascript" src="{{url('/assets/js/custom.js')}}"></script>

</body>
</html>