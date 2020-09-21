<html>
<head>
    <title>Think Before You Ink @yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
    <link rel="icon" type="image/png" sizes="16x16" href="../../../public/images/favicon-16x16.png">
</head>

<style>
    html, body {
        background-color: #F5F5DC;
        color: #636b6f;
        font-family: "Lobster", sans-serif;
        font-size: 20px;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    h1.name {
        text-align: center;
        font-size: 100px;
    }

    h2.head {
        text-align: center;
        font-size: 80px;
    }

    h3.card-title {
        text-align: center;
        font-size: 40px;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }


    .m-b-md {
        margin-bottom: 30px;
    }

    img.card-img {
        width: 400px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    p.card-text {
        text-align: center;
        font-size: 25px;
        margin-top: 20px;
    }

    img.detail {
        width: 500px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 40px;

    }

    #link-container {
        margin-top: 50px;
        text-align: center;
        font-size: 30px;
    }

    #link2-container {
        text-align: center;
        font-size: 25px;
    }

    div.form-group {
        font-size: 30px;
        margin-top: -10px;
    }



</style>

<body>
@section('sidebar')

@show

<div class="container">
    @yield('content')
</div>
</body>
</html>
