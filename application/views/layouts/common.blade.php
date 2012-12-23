<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>{{ $page_title }}</title>
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/style.css'); }}" />
	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> -->
	<script type="text/javascript" src="{{ asset('js/jquery-1.8.2.js'); }}"></script>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	{{ Asset::container('bootstrapper')->styles() }}
	{{ Asset::container('bootstrapper')->scripts() }}

</head>
<body>

	 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      {{ $content }}

    </div> <!-- /container -->

	

</body>
</html>