<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<title>@yield('title')</title>
		<link rel='stylesheet' type='text/css' href='/css/housework.css'>
    </head>
    <body>
      <div class="content">
		@yield('content')
      </div>
    </body>
</html>
