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
</head>
<body>

	{{ $content }}

</body>
</html>