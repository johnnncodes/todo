<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>{{ $page_title }}</title>

	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/style.css'); }}" />

	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	{{ Asset::container('bootstrapper')->styles() }}
	
</head>
<body>

    <div class="container">

      {{ $content }}

    </div> <!-- /container -->

    <script type="text/javascript" src="{{ asset('js/plugins.js'); }}"></script>

    {{ Asset::container('bootstrapper')->scripts() }}

	<script type="text/javascript" src="{{ asset('js/jquery-1.8.2.js'); }}"></script>

	<script type="text/javascript" src="{{ asset('js/jeditable.js'); }}"></script>

	<script type="text/javascript" src="{{ asset('js/todo.js'); }}"></script>



</body>
</html>

<!--
// End of file
// @author John Kevin M. Basco
-->