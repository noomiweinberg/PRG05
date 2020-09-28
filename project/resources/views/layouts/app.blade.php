<html>
<head>
    <title>Think Before You Ink @yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
    <link rel="icon" type="image/png" sizes="16x16" href="../../../public/images/favicon-16x16.png">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>


<body>
@section('sidebar')

@show

<div class="container">
    @yield('content')
</div>
</body>
</html>
